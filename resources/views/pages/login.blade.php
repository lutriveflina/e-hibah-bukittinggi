@extends('components.layouts.outer-page')

@section('content')
    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
        <img src="/assets/images/error/login-img.jpg" class="img-fluid" alt="">
    </div>
    <div class="col-lg-6">
        <div class="card-body p-4 p-sm-5">
            <h4 class="card-title">E-<span class="text-primary">HIBAH</span></h4>
            <p class="card-text mb-5">Silahkan Login!</p>
            @error('error')
                <div class="alert-danger">{{ $message }}</div>
            @enderror
            @if (session()->has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                </div>
            @endif
            <form action="{{ route('authenticate') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <input type="email" name="email" class="form-control radius-30 ps-5" id="inputEmailAddress"
                                placeholder="Email Address" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter
                            Password</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <input type="password" name="password" class="form-control radius-30 ps-5"
                                id="inputChoosePassword" placeholder="Enter Password">
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="remember" type="checkbox" id="flexSwitchCheckChecked"
                                checked="true">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                Me</label>
                        </div>
                    </div>
                    <div class="col-6 text-end"> <a href="{{ route('user.forgot_password') }}">Forgot Password ?</a>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary radius-30">Sign
                                In</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="mb-0">Don't have an account yet? <a href="javascript:">Sign up
                                here</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
