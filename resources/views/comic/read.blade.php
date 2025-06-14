@extends('layouts.app')
@section('title', $data['name'])
@section('content')
    <div class="chapter-wrapper container my-5">
        <a href="#" class="text-decoration-none">
            <h1 class="text-center text-success">{{ $data['name'] }}</h1>
        </a>
        <a href="#" class="text-decoration-none">
            <p class="text-center text-dark">Chương {{ $comic['chapter_name'] }}: {{ $comic['comic_name'] }}</p>
        </a>
        <hr class="chapter-start container-fluid">
        <div class="chapter-nav text-center">
            <div class="chapter-actions chapter-actions-origin d-flex align-items-center justify-content-center">
                <a class="btn btn-success me-1 chapter-prev {{ !isset($prev) ? 'disabled' : '' }}"
                    href="{{ route('comic.read', ['slugName' => $data['slug'], 'slug' => $prev['chapter_name'] ?? 0]) }}">
                    <span>Chương </span>trước
                </a>
                <a class="btn btn-success chapter-next {{ !isset($next) ? 'disabled' : '' }}"
                    href="{{ route('comic.read', ['slugName' => $data['slug'], 'slug' => $next['chapter_name'] ?? 0]) }}">
                    <span>Chương </span>tiếp
                </a>
            </div>
        </div>
        <hr class="chapter-end container-fluid">


        <div class="text-center chapter-content mb-3">
            @foreach ($comic['chapter_image'] as $image)
                <img src="{{ 'https://sv1.otruyencdn.com/' . $comic['chapter_path'] . '/' . $image['image_file'] }}"
                    alt="" class="w-100 h-auto" style="max-width: 720px">
            @endforeach
        </div>
    </div>

    <div class="chapter-actions chapter-actions-mobile d-flex align-items-center justify-content-center">
        <a class="btn btn-success me-2 chapter-prev" href="#" title=""> <span>Chương
            </span>trước</a>
        <button class="btn btn-success chapter_jump me-2" data-story-id="3" data-slug-chapter="chuong-1"
            data-slug-story="nang-khong-muon-lam-hoang-hau"><span>

                <svg style="fill: #fff;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
                    </path>
                </svg>
            </span></button>

        <div class="dropup select-chapter me-2 d-none">
            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
                Chọn chương
            </a>

            <ul class="dropdown-menu select-chapter__list" aria-labelledby="dropdownMenuLink">

            </ul>
        </div>
        <a class="btn btn-success chapter-next" href="#" title=""><span>Chương </span>tiếp</a>
    </div>
@endsection
