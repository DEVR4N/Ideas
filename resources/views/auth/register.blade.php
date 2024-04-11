@extends('layout.app')
@section('title', 'Register')
@section('content')
    <div class="row justify-content-center">
        <form class="form mt-5" action="{{route('register')}}" method="post">
            @csrf

            <section class="p-3 p-md-4 p-xl-5">
                <div class="container">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6 text-bg-dark">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <div class="col-10 col-xl-8 py-3">
                                        <i class="fa-solid fa-brain fa-beat-fade fa-2xl"></i>
                                        <hr>
                                        <h3 class="h3 mb-4">
                                            A free social networking where users broadcast short posts as idea.
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h2 class="h3">Registration</h2>
                                                <h3 class="fs-6 fw-normal text-secondary m-0">
                                                    Enter your details to register
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="#!">
                                        <div class="row gy-3 gy-md-4 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name" class="text-dark"> Name </label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                           placeholder="Name">
                                                    @error('name')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="email" class="text-dark"> Email </label>
                                                <span class="text-danger">*</span>
                                                <input type="email" name="email" id="email" class="form-control"
                                                       placeholder="mail@example.com" required>
                                                @error('email')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="text-dark"> Password </label>
                                                <span class="text-danger">*</span>
                                                <input type="password" name="password" id="password"
                                                       class="form-control">
                                                @error('password')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="confirm-password" class="text-dark"> Confirm
                                                    Password </label>
                                                <span class="text-danger">*</span>
                                                <input type="password" name="password_confirmation"
                                                       id="confirm-password"
                                                       class="form-control" required>
                                                @error('password_confirmation')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn bsb-btn-xl btn-dark" type="submit">
                                                        Sign up
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <hr class="mt-5 mb-4 border-secondary-subtle">
                                            <p class="m-0 text-secondary text-center">Already have an account ?
                                                <a href="/login" class="link-primary text-decoration-none">
                                                    <u> Login </u>
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
