@extends('welcome')
@section('title', 'Register')
@section('content')
    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <section class="write-us">
                    <h2>Register Account</h2>
                    <p>Register here for everything</p>
                    <form action="">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="fullname" class="form-label">Fullname</label>
                                    <input type="text" name="" id="fullname" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="" id="email" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="" id="username" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <input type="password" name="" id="password" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label"><b>Confirm Your Password</b></label>
                                    <input type="password" name="" id="password" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection
