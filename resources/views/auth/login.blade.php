@extends('layout.app')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-center">
    <section class=" py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border  rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <i class="fa-solid fa-brain fa-beat-fade fa-2xl"></i>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Login to your account</h2>
                            <form class="form mt-5" action="{{route('login')}}" method="post">
                                @csrf
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="mail@example.com" required>
                                            @error('email')
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                            <input type="password" class="form-control" name="password" id="password"
                                                   placeholder="password" required>
                                            @error('password')
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror

                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-dark btn-md" type="submit">Login</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Don't have an account?
                                            <a href="/register" class="link-primary text-decoration-none">
                                                <u>Register</u>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

