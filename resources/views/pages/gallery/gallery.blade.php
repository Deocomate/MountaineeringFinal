@extends('welcome')
@section('title', 'Gallery')
@section('gallery-active', 'active')
@section('content')
    <main class="container-fluid px-0">
        <div class="container-fluid px-0">
            <section style="background-image:url({{ asset('assets/img/gallery-head.jpg') }})" class="gallery-head">
                <div>
                    <h1>Gallery</h1>
                    <p>Home / Gallery</p>
                </div>
            </section>
        </div>
        <div class="row g-4 gallery-main">
            <div class="col-12 col-md-4 mt-0">
                <section class="Categories">
                    <h3>Categories</h3>
                    <div class="categories-list">
                        @foreach ($categories as $item)
                            <a
                                href="{{ route('pages.gallery.searchCategory', ['content' => $item->cate_name]) }}">{{ $item->cate_name }}</a>
                        @endforeach
                    </div>
                </section>
                <section class="Tags">
                    <h3>Tags</h3>
                    <div class="Tags-list">
                        @foreach ($tags as $item)
                            @if (isset($tag))
                                @if ($tag->id == $item->id)
                                    <a href="{{ route('pages.gallery.searchTag', ['content' => $item->tag_name]) }}"><button
                                            class="btn btn-info btn-sm">{{ $item->tag_name }}</button></a>
                                @else
                                    <a href="{{ route('pages.gallery.searchTag', ['content' => $item->tag_name]) }}"><button
                                            class="btn btn-outline-info btn-sm">{{ $item->tag_name }}</button></a>
                                @endif
                            @else
                                <a href="{{ route('pages.gallery.searchTag', ['content' => $item->tag_name]) }}"><button
                                        class="btn btn-outline-info btn-sm">{{ $item->tag_name }}</button></a>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-8">
                <section class="image-gallery">
                    <div class="gallery-sort">
                        <form action="">
                            <input type="text" name="" id="" class="form-control"
                                placeholder="Sort Default..." />
                        </form>
                    </div>
                    @if (isset($message))
                        @if ($message)
                            <h5>No Picture Found!</h5>
                        @endif
                    @endif
                    <div class="image-gallery-contain">
                        <div class="row g-4">
                            @foreach ($data as $item)
                                <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                    <div class="gallery-item">
                                        <img class="w-100" src="{{ asset('/gallery_img/' . $item->img_link) }}"
                                            alt="" />
                                        <div class="gallery-item-content">
                                            <i class="bi bi-heart-fill"></i>
                                        </div>
                                        <div class="gallery-item-overlay"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $data->links('pagination::bootstrap-5') }}
                </section>
            </div>
        </div>
    </main>
@endsection
