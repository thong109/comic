@extends('layouts.app')
@section('title', $data['name'])
@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-md-7 col-lg-8">
                <div class="head-title-global d-flex justify-content-between mb-4">
                    <div class="col-12 col-md-12 col-lg-4 head-title-global__left d-flex">
                        <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                            <span class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                title="Thông tin truyện">Thông tin truyện</span>
                        </h2>
                    </div>
                </div>

                <div class="story-detail">
                    <div class="story-detail__top d-flex align-items-start">
                        <div class="row align-items-start mb-5">
                            <div class="col-12 col-md-12 col-lg-3 story-detail__top--image">
                                <div class="book-3d">
                                    <img src="https://otruyen.cc/_next/image?url=https://img.otruyenapi.com/uploads/comics/{{ $data['thumb_url'] }}&w=256&q=75"
                                        alt="{{ $data['name'] }}" class="img-fluid w-100" width="200" height="300"
                                        loading="lazy">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-9 ps-4">
                                <h3 class="text-left story-name">{{ $data['name'] }}</h3>
                                {{-- <div class="rate-story mb-2">
                                    <div class="rate-story__holder" data-score="7.0">


                                        <img alt="1" src="./assets/images/star-on.png">



                                        <img alt="2" src="./assets/images/star-on.png">



                                        <img alt="3" src="./assets/images/star-on.png">



                                        <img alt="4" src="./assets/images/star-on.png">



                                        <img alt="5" src="./assets/images/star-on.png">



                                        <img alt="6" src="./assets/images/star-on.png">



                                        <img alt="7" src="./assets/images/star-half.png">



                                        <img alt="8" src="./assets/images/star-off.png">



                                        <img alt="9" src="./assets/images/star-off.png">



                                        <img alt="10" src="./assets/images/star-off.png">




                                    </div>
                                    <em class="rate-story__text"></em>
                                    <div class="rate-story__value" itemprop="aggregateRating" itemscope=""
                                        itemtype="https://schema.org/AggregateRating">
                                        <em>Đánh giá:
                                            <strong>
                                                <span itemprop="ratingValue">7.0</span>
                                            </strong>
                                            /
                                            <span class="" itemprop="bestRating">10</span>
                                            từ
                                            <strong>
                                                <span itemprop="ratingCount">415</span>
                                                lượt
                                            </strong>
                                        </em>
                                    </div>
                                </div> --}}
                                <div class="story-detail__top--desc px-3" style="max-height: 285px;">
                                    {!! $data['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="story-detail__bottom mb-3">
                        <div class="row">
                            <div class="col-12 story-detail__bottom--info">
                                <p class="mb-1">
                                    <strong>Tác giả:</strong>
                                    @foreach ($data['author'] as $author)
                                        <span
                                            class="d-inline-block text-decoration-none text-dark hover-title">{{ $author !== '' && !empty($author) ? $author : 'Đang cập nhật...' }}</span>
                                    @endforeach
                                </p>
                                <div class="d-flex align-items-center mb-1 flex-wrap">
                                    <strong class="me-1">Thể loại:</strong>
                                    <div class="d-flex align-items-center flex-warp">
                                        @foreach ($data['category'] as $category)
                                            <a href="{{ route('category.show', ['slug' => $category['slug'], 'page' => 1]) }}" class="text-decoration-none text-dark hover-title me-1"
                                                style="width: max-content;">{{ $category['name'] }}, </a>
                                        @endforeach
                                    </div>
                                </div>

                                <p class="mb-1">
                                    <strong>Trạng thái:</strong>
                                    @if ($data['status'] === 'ongoing')
                                        <span class="text-danger">Đang cập nhật...</span>
                                    @endif
                                    @if ($data['status'] === 'completed')
                                        <span class="text-info">Đã hoàn thành</span>
                                    @endif
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="story-detail__list-chapter">
                        <div class="head-title-global d-flex justify-content-between mb-4">
                            <div class="col-6 col-md-12 col-lg-4 head-title-global__left d-flex">
                                <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                    <span href="#" class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                        title="Truyện hot">Danh sách chương</span>
                                </h2>
                            </div>
                        </div>
                        @if (isset($data['chapters'][0]['server_data']))
                            <div class="story-detail__list-chapter--list">
                                <div class="row">
                                    <div class="col-12 story-detail__list-chapter--list__item">
                                        <ul class="d-flex flex-wrap gap-2 p-0">
                                            @foreach ($data['chapters'][0]['server_data'] as $chapter)
                                                <li
                                                    class="d-inline-flex justify-content-center align-items-center btn btn-default">
                                                    <a href="{{ route('comic.read', ['slugName' => $data['slug'], 'slug' => $chapter['chapter_name']]) }}"
                                                        class="text-decoration-none text-dark hover-title">Chương:
                                                        {{ $chapter['chapter_name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-center">Chưa có thông tin...</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 col-lg-4 sticky-md-top">

                <div class="row top-ratings">
                    <div class="col-12 top-ratings__tab mb-2">
                        <div class="list-group d-flex flex-row" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="top-day-list" data-bs-toggle="list"
                                href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-day" role="tab"
                                aria-controls="top-day" aria-selected="true">Ngày</a>
                            <a class="list-group-item list-group-item-action" id="top-month-list" data-bs-toggle="list"
                                href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-month" role="tab"
                                aria-controls="top-month" aria-selected="false" tabindex="-1">Tháng</a>
                            <a class="list-group-item list-group-item-action" id="top-all-time-list" data-bs-toggle="list"
                                href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-all-time" role="tab"
                                aria-controls="top-all-time" aria-selected="false" tabindex="-1">All
                                time</a>
                        </div>
                    </div>
                    <div class="col-12 top-ratings__content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="top-day" role="tabpanel"
                                aria-labelledby="top-day-list">
                                <ul>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-danger rounded-circle">
                                                <span class="text-light">1</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                    Vũ Thiên Hạ</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                        Huyễn
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/xuyen-khong"
                                                        class="text-decoration-none text-dark hover-title ">Xuyên
                                                        Không
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-success rounded-circle">
                                                <span class="text-light">2</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                    Đạo Đan Tôn</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-info rounded-circle">
                                                <span class="text-light">3</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/me-vo-khong-loi-ve"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Mê
                                                    Vợ Không Lối Về</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/nguoc"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngược
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/sung"
                                                        class="text-decoration-none text-dark hover-title ">Sủng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">4</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                    Phá Thương Khung</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">5</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/the-gioi-hoan-my"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Thế
                                                    Giới Hoàn Mỹ</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Kiếm
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">6</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                    Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                    Ngọt)</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/trong-sinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                        Sinh
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/sung"
                                                        class="text-decoration-none text-dark hover-title ">Sủng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">7</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                    Nhân Tu Tiên</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                                        class="text-decoration-none text-dark hover-title ">Kiếm
                                                        Hiệp
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">8</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                    Niệm Vĩnh Hằng</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">9</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/de-ba"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                    Bá</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">10</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/re-quy-troi-cho"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Rể
                                                    Quý Trời Cho</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/do-thi"
                                                        class="text-decoration-none text-dark hover-title ">Đô Thị
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="top-month" role="tabpanel" aria-labelledby="top-month-list">
                                <ul>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-danger rounded-circle">
                                                <span class="text-light">1</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                    Vũ Thiên Hạ</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                        Huyễn
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/xuyen-khong"
                                                        class="text-decoration-none text-dark hover-title ">Xuyên
                                                        Không
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-success rounded-circle">
                                                <span class="text-light">2</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                    Đạo Đan Tôn</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-info rounded-circle">
                                                <span class="text-light">3</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/me-vo-khong-loi-ve"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Mê
                                                    Vợ Không Lối Về</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/nguoc"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngược
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/sung"
                                                        class="text-decoration-none text-dark hover-title ">Sủng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">4</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                    Phá Thương Khung</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">5</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/the-gioi-hoan-my"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Thế
                                                    Giới Hoàn Mỹ</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Kiếm
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">6</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                    Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                    Ngọt)</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/trong-sinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                        Sinh
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/sung"
                                                        class="text-decoration-none text-dark hover-title ">Sủng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">7</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                    Nhân Tu Tiên</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                                        class="text-decoration-none text-dark hover-title ">Kiếm
                                                        Hiệp
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">8</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                    Niệm Vĩnh Hằng</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">9</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/de-ba"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                    Bá</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">10</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/re-quy-troi-cho"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Rể
                                                    Quý Trời Cho</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/do-thi"
                                                        class="text-decoration-none text-dark hover-title ">Đô Thị
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="top-all-time" role="tabpanel"
                                aria-labelledby="top-all-time-list">
                                <ul>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-danger rounded-circle">
                                                <span class="text-light">1</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                    Vũ Thiên Hạ</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                        Huyễn
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/xuyen-khong"
                                                        class="text-decoration-none text-dark hover-title ">Xuyên
                                                        Không
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-success rounded-circle">
                                                <span class="text-light">2</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                    Đạo Đan Tôn</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-info rounded-circle">
                                                <span class="text-light">3</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                    Phá Thương Khung</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/di-gioi"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                        Giới
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">4</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                    Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                    Ngọt)</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                        Tình
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/trong-sinh"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                        Sinh
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/sung"
                                                        class="text-decoration-none text-dark hover-title ">Sủng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">5</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                    Nhân Tu Tiên</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                                        class="text-decoration-none text-dark hover-title ">Kiếm
                                                        Hiệp
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">6</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                    Niệm Vĩnh Hằng</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">7</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/de-ba"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                    Bá</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">8</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/vu-dong-can-khon"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Vũ
                                                    Động Càn Khôn</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-item d-flex align-items-center">
                                            <div class="rating-item__number bg-light border rounded-circle">
                                                <span class="text-dark">9</span>
                                            </div>
                                            <div class="rating-item__story">
                                                <a href="https://suustore.com/truyen/doc-ton-tam-gioi"
                                                    class="text-decoration-none hover-title rating-item__story--name text-one-row">Độc
                                                    Tôn Tam Giới</a>
                                                <div class="d-flex flex-wrap rating-item__story--categories">
                                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                                        class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                        Hiệp
                                                        ,
                                                    </a>
                                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                                        class="text-decoration-none text-dark hover-title ">Huyền
                                                        Huyễn
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <li class="">
                                <a href="https://suustore.com/the-loai/ngon-tinh"
                                    class="text-decoration-none text-dark hover-title">Ngôn Tình</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/trong-sinh"
                                    class="text-decoration-none text-dark hover-title">Trọng Sinh</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/co-dai"
                                    class="text-decoration-none text-dark hover-title">Cổ Đại</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/tien-hiep"
                                    class="text-decoration-none text-dark hover-title">Tiên Hiệp</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/nguoc"
                                    class="text-decoration-none text-dark hover-title">Ngược</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/khac"
                                    class="text-decoration-none text-dark hover-title">Khác</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/di-gioi"
                                    class="text-decoration-none text-dark hover-title">Dị Giới</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/huyen-huyen"
                                    class="text-decoration-none text-dark hover-title">Huyền Huyễn</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/xuyen-khong"
                                    class="text-decoration-none text-dark hover-title">Xuyên Không</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/sung"
                                    class="text-decoration-none text-dark hover-title">Sủng</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/cung-dau"
                                    class="text-decoration-none text-dark hover-title">Cung Đấu</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/gia-dau"
                                    class="text-decoration-none text-dark hover-title">Gia Đấu</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/dien-van"
                                    class="text-decoration-none text-dark hover-title">Điền Văn</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/do-thi"
                                    class="text-decoration-none text-dark hover-title">Đô Thị</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/truyen-teen"
                                    class="text-decoration-none text-dark hover-title">Truyện Teen</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/hai-huoc"
                                    class="text-decoration-none text-dark hover-title">Hài Hước</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/kiem-hiep"
                                    class="text-decoration-none text-dark hover-title">Kiếm Hiệp</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/dong-phuong"
                                    class="text-decoration-none text-dark hover-title">Đông Phương</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/trinh-tham"
                                    class="text-decoration-none text-dark hover-title">Trinh Thám</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/quan-truong"
                                    class="text-decoration-none text-dark hover-title">Quan Trường</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/linh-di"
                                    class="text-decoration-none text-dark hover-title">Linh Dị</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/dam-my"
                                    class="text-decoration-none text-dark hover-title">Đam Mỹ</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/quan-su"
                                    class="text-decoration-none text-dark hover-title">Quân Sự</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/khoa-huyen"
                                    class="text-decoration-none text-dark hover-title">Khoa Huyễn</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/mat-the"
                                    class="text-decoration-none text-dark hover-title">Mạt Thế</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/xuyen-nhanh"
                                    class="text-decoration-none text-dark hover-title">Xuyên Nhanh</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/he-thong"
                                    class="text-decoration-none text-dark hover-title">Hệ Thống</a>
                            </li>
                            <li class="">
                                <a href="https://suustore.com/the-loai/nu-cuong"
                                    class="text-decoration-none text-dark hover-title">Nữ Cường</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
