<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private const LIMIT_12 = 12;
    private const LIMIT_20 = 20;

    public function index()
    {
        try {
            $data02 = cache()->remember('home_new', 600, fn() => $this->fetchJson('https://otruyenapi.com/v1/api/danh-sach/truyen-moi'));
            $data03 = cache()->remember('home_completed', 600, fn() => $this->fetchJson('https://otruyenapi.com/v1/api/danh-sach/hoan-thanh'));
            $data04 = cache()->remember('home_ongoing', 600, fn() => $this->fetchJson('https://otruyenapi.com/v1/api/danh-sach/sap-ra-mat'));

            $data2 = array_slice($this->filterHasChapters($data02['data']['items'] ?? []), 0, self::LIMIT_12);
            $data3 = array_slice($this->filterHasChapters($data03['data']['items'] ?? []), 0, self::LIMIT_12);
            $data4 = array_slice($this->filterHasChapters($data04['data']['items'] ?? []), 0, self::LIMIT_20);
            return view('welcome', compact('data2', 'data3', 'data4'));
        } catch (\Exception $e) {
            report($e); // ghi log lỗi
            return abort(500, 'Không thể lấy dữ liệu từ API');
        }
    }

    private function fetchJson(string $url): array
    {
        $response = Http::get($url);
        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception("API request failed: $url");
    }

    private function filterHasChapters(array $items): array
    {
        return array_filter($items, function ($item) {
            return !empty($item['chaptersLatest']) && !empty($item['chaptersLatest'][0]['chapter_name']);
        });
    }
}
