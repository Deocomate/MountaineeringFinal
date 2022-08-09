@extends('welcome')
@section('home-active', 'active')
@section('title', 'Home')
@section('content')
    <div class="home">
        <main class="container-fluid px-0">
            <section class="heading" style="background-image: url('./assets/img/home-head.jpg')">
                <div class="heading-contain">
                    <h1>
                        Discover everything about the sport of mountaineering
                    </h1>
                    <div class="heading-btn flex-column flex-md-row d-flex justify-content-center">
                        <a class="text-center" href="{{ route('blogs') }}"><button class="btn btn-success">Go To
                                Blog</button></a>
                        <a class="text-center" href="{{ route('gallery') }}"><button class="btn btn-success">See
                                Gallery</button></a>
                    </div>
                </div>
            </section>
            <section class="history container-fluid">
                <h3>The Origins of Mountaineering</h3>
                <p>
                    Mountaineering has been a common practice, if not exactly a hobby,
                    for a long time. People have been scaling mountains as a hobby since
                    as early as 1336. Sir Alfred Wills’ ascent of the Swiss Wetterhorn
                    in 1865 is considered to be the birth of mountaineering as a sport.
                </p>
                <p>
                    Mountaineering is a lifelong philosophy rather than a mere hobby.
                    Unlike most other extreme sports, mountaineering is uniquely suited
                    to be a lifelong hobby rather than a one-time experience; base
                    jumping and cliff diving may be fun the first few times, but it’s
                    the same activity every time. In contrast, with mountaineering,
                    every mountain is a new experience, not to mention the feeling of
                    achievement from conquering each new mountain.
                </p>
            </section>
            <section class="type">
                <div class="type-content container-fluid">
                    <h3>Different types of mountaineering</h3>
                    <p>
                        There are two main styles of mountaineering: alpine and
                        expedition. Alpine mountaineering is practiced in medium-sized
                        mountains, as opposed to the expedition style’s larger mountains.
                    </p>
                    <p>
                        Alpine mountaineers pack light and move quickly, and they make a
                        swift push to the peak. This is possible as medium-sized
                        mountains, like the Alps or the Rocky Mountains, can be scaled
                        relatively more quickly.
                    </p>
                    <p>
                        Expedition mountaineers, on the other hand, move slowly and carry
                        much heavier loads. This is necessitated as these larger
                        mountains, like the Himalayas and the Alaska Range, take weeks or
                        months to climb and as the journey between base camps is much
                        longer. Expeditioners can even travel with pack animals.
                    </p>
                </div>
                <div class="type-img row g-0 w-100 mx-0">
                    <div class="col-12 col-lg-4" style="background-image: url('./assets/img/winter-moutain.jpg')">
                        <div class="type-img-content px-0">
                            <p>Winter mountaineering - Summer mountaineering</p>
                            <a href=""><button class="btn">See More</button></a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" style="background-image: url('./assets/img/winter-moutain.jpg')">
                        <div class="type-img-content px-0">
                            <p>Winter mountaineering - Summer mountaineering</p>
                            <a href=""><button class="btn">See More</button></a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" style="background-image: url('./assets/img/winter-moutain.jpg')">
                        <div class="type-img-content px-0">
                            <p>Winter mountaineering - Summer mountaineering</p>
                            <a href=""><button class="btn">See More</button></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="skill container">
                <div class="skill-content-1">
                    <h3>Skills achieved for mountaineering</h3>
                </div>
                <div class="skill-content row g-3">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="item">
                            <img class="w-100" src="./assets/img/climbing-skill.jpg" alt="" />
                            <div class="w-100 item-p">
                                <p>Climbing skill</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="dangers">
                <div class="dangers-content w-100 container">
                    <div class="row gx-0">
                        <div class="col-12 col-lg-6">
                            <img src="./assets/img/danger.png" class="w-100" alt="" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="dangers-content-contain">
                                <div>
                                    <h3>Mountaineering and their dangers</h3>
                                    <ul>
                                        <li>Extreme temperature</li>
                                        <li>Dangerous wildlife, animals</li>
                                        <li>Natural disaster</li>
                                        <li>Falling</li>
                                        <li>Dehydration</li>
                                        <li>Equipment failure</li>
                                        <li>Getting lost</li>
                                        <li>High altitudes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
