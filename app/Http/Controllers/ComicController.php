<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $response = Http::get('https://otruyenapi.com/v1/api/truyen-tranh/' . $slug);
        if ($response->successful()) {
            $data = $response->json();
            $data = $data['data']['item'];
        }
        return view('comic.show', compact('data'));
    }

    public function read($slugName, $slug)
    {
        $data = cache()->remember("comic_$slugName", 3600, function () use ($slugName) {
            $response = Http::get("https://otruyenapi.com/v1/api/truyen-tranh/$slugName");
            return $response->successful() ? $response->json()['data']['item'] : null;
        });

        if (!$data) return view('404');

        $chapterList = collect($data['chapters'][0]['server_data']);
        $currentIndex = $chapterList->search(fn($c) => intval($c['chapter_name']) === intval($slug));

        if ($currentIndex === false) return view('404');

        $detail = $chapterList[$currentIndex];
        $prev = $chapterList->get($currentIndex - 1);
        $next = $chapterList->get($currentIndex + 1);

        $comic = cache()->remember("chapter_" . md5($detail['chapter_api_data']), 3600, function () use ($detail) {
            $res = Http::get($detail['chapter_api_data']);
            return $res->successful() ? $res->json()['data']['item'] : null;
        });

        if (!$comic) return view('404');

        return view('comic.read', compact('prev', 'next', 'data', 'comic'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
