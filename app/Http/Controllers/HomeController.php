<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://otruyenapi.com/v1/api/home');
        $response2 = Http::get('https://otruyenapi.com/v1/api/danh-sach/hoan-thanh');

        if ($response->successful() && $response2->successful()) {
            $data = $response->json();
            $done = $response2->json();
            $dones = array_slice($done['data']['items'], 0, 12);
            return view('welcome', compact('data', 'dones'));
        }

        return abort(500, 'Không thể lấy dữ liệu từ API');
    }
}
