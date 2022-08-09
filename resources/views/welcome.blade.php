<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- BOOTSTRAP 5 CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}" />
</head>

<body>
    <header>
        <div id="app">
            <nav>
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand text-black" href="{{ url('/') }}">
                        @if (Auth::check())
                            <p class="mb-0 text-dark">Login Success!</p>
                        @else
                            <p class="mb-0 text-dark">You dont login!</p>
                        @endif
                    </a>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="d-flex my-3" style="list-style-type: none">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="ms-3">
                                        <a class="text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="ms-3">
                                        <a class="text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle px-0" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-white nav_custom navbar-light">
            <div class="container-lg">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item @yield('home-active')">
                            <a class="nav-link " href="{{ route('homepage') }}">HOME</a>
                        </li>
                        <li class="nav-item @yield('gallery-active')">
                            <a class="nav-link " href="{{ route('gallery') }}">GALLERY</a>
                        </li>
                        <li class="nav-item @yield('blog-active')">
                            <a class="nav-link " href="{{ route('blogs') }}">BLOG</a>
                        </li>
                        <li class="nav-item @yield('contact-active')">
                            <a class="nav-link " href="{{ route('contact') }}">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <h3>About Us</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad qui
                            molestias, rerum reiciendis debitis inventore aut doloremque
                            commodi ullam blanditiis error voluptatibus, dolor laborum
                            harum? Dolor eum tempora deleniti inventore?
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h3>Latest News</h3>
                        <p>
                            <a href="">Lorem ipsum dolor sit amet.</a>
                        </p>
                        <p>
                            <a href="">Lorem ipsum dolor sit amet.</a>
                        </p>
                        <p>
                            <a href="">Lorem ipsum dolor sit amet.</a>
                        </p>
                        <p>
                            <a href="">Lorem ipsum dolor sit amet.</a>
                        </p>
                        <p>
                            <a href="">Lorem ipsum dolor sit amet.</a>
                        </p>
                    </div>
                    <div class="col-12 col-lg-4">
                        <h3>Contact Us</h3>
                        <div class="footer_info d-flex">
                            <div class="footer-icon me-3">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <span>19 Hàng Thiếc</span>
                        </div>
                        <div class="footer_info d-flex">
                            <div class="footer-icon me-3">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <span>deocomate@gmail.com</span>
                        </div>
                        <div class="footer_info d-flex">
                            <div class="footer-icon me-3">
                                <i class="bi bi-phone"></i>
                            </div>
                            <span>0565651189</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom container">
            <form>
                <div class="row d-flex align-items-center g-4">
                    <div style="margin-top: 0px" class="col-12 col-lg-4 text-center text-lg-start">
                        <label for="footer_form_email">Sign up for our Newsletter</label>
                    </div>
                    <div class="col-8 col-lg-6 mt-0">
                        <input type="email" class="form-control" placeholder="Enter Email Address ..."
                            name="" id="" />
                    </div>
                    <div class="col-4 col-lg-2 text-center mt-0">
                        <button type="submit" class="btn w-100">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form_copywrite">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero,
                deleniti.
            </p>
        </div>
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
