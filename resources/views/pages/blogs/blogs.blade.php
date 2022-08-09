@extends('welcome')
@section('title', 'Blog')
@section('blog-active','active')
@section('content')
    <section id="blog-header">
        <div class="container">
            <h1>BLOG</h1>
            <h6>TIN TỨC MỚI NHẤT VỀ LEO NÚI</h6>
        </div>
    </section>
    <main class="container">
        <div class="row">
            <div class="col-12 col-lg-9 list-post-contain">
                <div class="list-post">
                    @foreach ($data as $item)
                        <a href="{{ route('blog.show',['slug'=>$item->heading_slug,]) }}">
                            <div class="list-post-item">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-3 px-0">
                                            <img class="w-100" style="" src="{{ asset("/blog_img/".$item->thumbnail) }}" alt="" />
                                            <div class="list-post-date">
                                                <span>{{date_format($item->updated_at,'d')}}</span>
                                                <span>{{date_format($item->updated_at,'m')}}/{{date_format($item->updated_at,'Y')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-9 list-post-info">
                                            <h3>{{$item->heading}}</h3>
                                            <div class="d-md-flex justify-content-md-start">
                                                <p>
                                                    <i class="bi bi-calendar"></i><span>{{$item->updated_at->day}}/{{$item->updated_at->month}}/{{$item->updated_at->year}}</span>
                                                </p>
                                                <p><i class="bi bi-geo-alt"></i><span>{{$item->locate}}</span></p>
                                                <p>
                                                    <i class="bi bi-person"></i><span>{{$item->author}}</span>
                                                </p>
                                            </div>
                                            <p class="list-post-info-p">
                                                {{$item->title}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{$data->links('pagination::bootstrap-5')}}
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-lg-4 recent-post-contain">
                <form action="" class="container recent-post-search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." />
                        <button class="btn btn-info" type="button" id="button-addon2">
                            Search
                        </button>
                    </div>
                </form>
                <div class="recent-post">
                    <h3 class="mb-3">Recent posts</h3>
                    @foreach ($latesBlog as $item)
                        <a href="{{ route('blog.show',['slug'=>$item->heading_slug,]) }}">
                            <div class="recent-post-item">
                                <div class="d-flex justify-content-start">
                                    <div class="img">
                                        <img src="{{ asset('/blog_img/'.$item->thumbnail) }}" alt="" />
                                    </div>
                                    <div class="description">
                                        <p>{{$item->updated_at->day}}/{{$item->updated_at->month}}/{{$item->updated_at->year}}</p>
                                        <h5>{{$item->heading}}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <script>
        window.addEventListener("load", () => {
            let strs = document.getElementsByClassName("list-post-info-p");
            let strs_lates = document.querySelectorAll('.description h5');
            for (let str of strs) {
                str.innerHTML = str.innerHTML
                    .replace(/\s+/g, " ")
                    .trim()
                    .substring(0, 150)
                    .concat("...");
            }
            console.log(strs_lates);
            for (let str of strs_lates) {
                str.innerHTML = str.innerHTML
                    .replace(/\s+/g, " ")
                    .trim()
                    .substring(0, 25)
                    .concat("...");
            }
        });
    </script>
@endsection
