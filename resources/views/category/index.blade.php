@extends('layouts.app')
@section('title', $data['titlePage'])
@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-md-8 col-lg-9 mb-3">
                <div class="head-title-global d-flex justify-content-between mb-2">
                    <div class="col-12 col-md-12 col-lg-12 head-title-global__left d-flex">
                        <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                            <span href="#" class="d-block text-decoration-none text-dark fs-4 category-name"
                                title="{{ $data['titlePage'] }}">{{ $data['titlePage'] }}</span>
                        </h2>
                    </div>
                </div>

                <div class="list-story-in-category section-stories-hot__list">
                    @foreach ($data['items'] as $d)
                        <div class="story-item">
                            <a href="{{ route('comic.show', ['slug' => $d['slug']]) }}"
                                class="d-block text-decoration-none">
                                <div class="story-item__image">
                                    <img src="https://otruyen.cc/_next/image?url=https://img.otruyenapi.com/uploads/comics/{{ $d['thumb_url'] }}&w=256&q=75"
                                        alt="{{ $d['name'] }}" class="img-fluid w-100" width="150" height="230"
                                        loading="lazy">
                                </div>
                                <h3 class="story-item__name text-one-row story-name">{{ $d['name'] }}</h3>

                                <div class="list-badge">
                                    @if (isset($d['chaptersLatest'][0]['chapter_name']))
                                        <span class="story-item__badge badge text-bg-success">
                                            Chương {{ $d['chaptersLatest'][0]['chapter_name'] }}
                                        </span>
                                    @else
                                        <span class="story-item__badge badge text-bg-danger">Sắp ra mắt</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 sticky-md-top">
                <div class="category-description bg-light p-2 rounded mb-3 card-custom">
                    <p class="mb-0 text-secondary"></p>
                    <p>Truyện thuộc kiểu lãng mạn, kể về những sự kiện vui buồn trong tình yêu của nhân vật chính.
                    </p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
@endsection
