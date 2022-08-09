@extends('welcome')
@section('title', 'Login')
@section('content')
    <main class="container" style="max-width:700px;">
        <div class="row">
            <div class="col-12 mt-5">
                <section class="write-us">
                    <h2>Login Account</h2>
                    <p>Login here for everything</p>
                    <form action="">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="" id="username" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <input type="password" name="" id="password" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection
