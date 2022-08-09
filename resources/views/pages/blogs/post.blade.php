@extends('welcome')
@section('title', 'Post')
@section('blog-active', 'active')
@section('content')
    <main class="post" style="width: 90%; margin: 0 auto">
        <section class="post-heading">
            <h1>{{ $data->heading }}</h1>
            <p>{{ $data->heading2 }}</p>
        </section>
        <div class="row g-0">
            <div class="col-12 col-lg-9">
                <div class="post-contain">
                    <section class="thumnail">
                        <img class="w-100" style="max-height: 500px;object-fit: cover;object-position: center"
                            src="{{ asset('/blog_img/' . $data->thumbnail) }}" alt="" />
                        <div class="contact-link">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                        </div>
                    </section>
                    <section class="post-content">
                        {!! $data->content !!}

                    </section>
                    <section class="post-comment container">
                        <hr>
                        <div class="new-comment">
                            @if (!Auth::check())
                                <div class="alert alert-warning d-flex justify-content-between align-items-center"
                                    role="alert">
                                    <p class="mb-0">You need login to comment</p>
                                    <a class="me-3" href="{{ route('login') }}">Login</a>
                                </div>
                            @else
                                <form action="{{ route('blog.comment.add', ['blog_id' => $data->id, 'user_id' => $user_id]) }}"
                                    method="post" class="mb-0">
                                    @csrf
                                    <input type="text" name="cmt" id="cmt" class="form-control mb-2"
                                        placeholder="Leave your comment..." />
                                    <button class="btn btn-success">Comment</button>
                                </form>
                            @endif
                        </div>
                        <hr>
                        <h4>{{ count($comments) }} commnent</h4>
                        @foreach ($comments as $item)
                            <div class="post-comment-item px-3 py-3">
                                <div class="row g-0">
                                    <div class="col-12 d-flex align-items-center mb-2">
                                        <div class="mx-0">
                                            <img src="{{ asset('assets/img/bl2.jpg') }}" alt="" />
                                        </div>
                                        <div class="mx-0 ms-3">
                                            <h5 class="mb-0">{{ $item->name }}</h5>
                                            @php
                                                $input = $item->created_at;
                                                $item->created_at = strtotime($input);
                                            @endphp
                                            <p class="mb-0">{{ date('F j, Y', $item->created_at) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-0" style="text-align: justify">
                                            {{ $item->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $comments->links() }}
                    </section>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="recent-post-contain">
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
                            <a href="{{ route('blog.show', ['slug' => $item->heading_slug]) }}">
                                <div class="recent-post-item">
                                    <div class="d-flex justify-content-start">
                                        <div class="img">
                                            <img src="{{ asset('/blog_img/' . $item->thumbnail) }}" alt="" />
                                        </div>
                                        <div class="description">
                                            <p>{{ $item->updated_at->day }}/{{ $item->updated_at->month }}/{{ $item->updated_at->year }}
                                            </p>
                                            <h5>{{ $item->heading }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        window.addEventListener("load", () => {
            let strs_lates = document.querySelectorAll('.description h5');
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
