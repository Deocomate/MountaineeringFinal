@extends('welcome')
@section('title', 'Contact')
@section('contact-active','active')
@section('content')
    <main class="container">
        <section class='contact-map'>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.97896906649!2d105.84575011469062!3d21.03352748599577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abbe60e1d779%3A0x63d3c8efd288e933!2zMTkgUC4gSMOgbmcgVGhp4bq_YywgSMOgbmcgR2FpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1658720802184!5m2!1svi!2s"
                width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <div class="row">
            <div class="col-12 col-lg-6">
                <section class="write-us">
                    <h2>WRITE US</h2>
                    <p>Contact us from here</p>
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="fullname" required id="name" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" required id="email" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea name="message" required class="w-100 form-control" id="message" style="height: 100px"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-12 col-lg-6">
                <section class="contacts">
                    <h2>CONTACTS</h2>
                    <p>Information</p>
                    <div class="d-flex justify-content-between">
                        <b>Address</b>
                        <hr />
                        <p>Pellegrino, Veneto, Italy</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Web</b>
                        <hr />
                        <p>Mountaineering.com</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Email</b>
                        <hr />
                        <p>Deocomate@gmail.com</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Phone</b>
                        <hr />
                        <p>0565651189</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b>Facebook</b>
                        <hr />
                        <p>domain.fb</p>
                    </div>
                    <div class="contact-link">
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
