@extends('components.layouts.outer-page')

@section('content')

<div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
    <img src="/assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
</div>
<div class="col-lg-6">
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title">Lupa Password?</h5>
        <p class="card-text mb-5">Masukan email yang telah terdaftar sebelumnya</p>
        <form class="form-body" action="{{ route('user.reset_password_link') }}">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="inputEmailid" class="form-label">Email id</label>
                    <input type="email" name="email" class="form-control form-control-lg radius-30" id="inputEmailid"
                        placeholder="Email id">
                </div>
                <div class="col-12">
                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-lg btn-primary radius-30">Send</button>
                        <a href="authentication-signin.html" class="btn btn-lg btn-light radius-30">Back to Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection