@extends('layouts.app')
@section('title','Go to Home Page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <p class="mb-0">Your Infomation</p>
                            <div class="d-flex align-items-center">
                                <b class="me-2 fs-6">Update off</b>
                                <label class="switch">
                                    <input onclick="check()" type="checkbox" id="CheckUpdate">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <!-- Rounded switch -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', ['id'=>$data->id]) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input value="{{ $data->name }}" type="text" name="name" required id="name"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input value="{{ $data->phone }}" type="text" name="phone" required id="phone"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning" disabled>
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
