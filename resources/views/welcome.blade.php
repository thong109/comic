@extends('layouts.app')
@section('title', 'Chào mừng đến với TheComic')
@section('content')
    <x-hot-comic :data="$data2" title="Truyện mới" />
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-md-8 col-lg-9">
                <div class="section-stories-new mb-3">
                    <div class="row">
                        <div class="head-title-global d-flex justify-content-between mb-2">
                            <div class="col-6 col-md-4 col-lg-4 head-title-global__left d-flex align-items-center">
                                <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                    <span class="d-block text-decoration-none text-dark fs-4 story-name">Sắp ra mắt</span>
                                </h2>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="section-stories-new__list">
                                @foreach ($data4 as $data)
                                    <div class="story-item-no-image">
                                        <div class="story-item-no-image__name d-flex align-items-center">
                                            <h3 class="me-1 mb-0 d-flex align-items-center title-sm">
                                                <svg style="width: 10px; margin-right: 5px;flex:0 0 auto"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                    <path
                                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                                    </path>
                                                </svg>
                                                <a href="{{ route('comic.show', ['slug' => $data['slug']]) }}"
                                                    class="text-decoration-none text-dark fs-6 hover-title text-one-row story-name">{{ $data['name'] }}</a>
                                            </h3>
                                            <span class="badge text-bg-danger text-light">Hot</span>
                                        </div>

                                        <div class="story-item-no-image__categories ms-2 d-none d-lg-block">
                                            <p class="mb-0">
                                                @foreach ($data['category'] as $category)
                                                    <a href="#"
                                                        class="hover-title text-decoration-none text-dark category-name">{{ $category['name'] }}
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    </a>
                                                @endforeach
                                            </p>
                                        </div>

                                        <div class="story-item-no-image__chapters ms-2">
                                            <a href="{{ route('comic.read', ['slugName' => $data['slug'], 'slug' => $data['chaptersLatest'][0]['chapter_name'] ?? 0]) }}"
                                                class="hover-title text-decoration-none text-info">Chương
                                                {{ $data['chaptersLatest'][0]['chapter_name'] ?? '' }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 sticky-md-top">
                <div class="row">

                    <div class="col-12">
                        <div class="section-list-category bg-light p-2 rounded card-custom">
                            <div class="head-title-global mb-2">
                                <div class="col-12 col-md-12 head-title-global__left">
                                    <h2 class="mb-0 border-bottom border-secondary pb-1">
                                        <span href="#" class="d-block text-decoration-none text-dark fs-4"
                                            title="Truyện đang đọc">Thể loại truyện</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Horizontal under breakpoint -->
                                <ul class="list-category">
                                    @foreach ($settings['data']['items'] as $item)
                                        <li class="">
                                            <a href="{{ route('category.show', ['slug' => $item['slug'], 'page' => 1]) }}"
                                                class="text-decoration-none text-dark hover-title">{{ $item['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-hot-comic :data="$data3" title="Đã hoàn thành" />
@endsection
