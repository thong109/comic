<div class="section-stories-full mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="head-title-global d-flex justify-content-between mb-2">
                <div class="col-12 col-md-4 head-title-global__left d-flex">
                    <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                        <span class="d-block text-decoration-none text-dark fs-4 title-head-name"
                            title="{{ $title }}">{{ $title }}</span>
                    </h2>
                    <i class="fa-solid fa-fire-flame-curved"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row g-2 g-md-4">
                    @foreach ($data as $d)
                        <div class="col-6 col-sm-3 col-md-3 col-lg-2 text-center">
                            <div class="position-relative">
                                <a href="{{ route('comic.show', ['slug' => $d['slug']]) }}"
                                    class="d-block story-item-full__image">
                                    <img src="https://otruyenapi.com/uploads/comics/{{ $d['thumb_url'] }}"
                                        alt="{{ $d['name'] }}" class="img-fluid w-100" width="150" height="230"
                                        loading="lazy">
                                </a>
                                <h3 class="fs-6 story-item-full__name fw-bold text-center mb-0">
                                    <a href="{{ route('comic.show', ['slug' => $d['slug']]) }}"
                                        class="text-decoration-none text-one-row story-name">
                                        {{ $d['name'] }}
                                    </a>
                                </h3>
                                <span class="story-item-full__badge badge text-bg-success">Chương
                                    {{ $d['chaptersLatest'][0]['chapter_name'] ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
