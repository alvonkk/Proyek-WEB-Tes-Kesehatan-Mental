@extends('layout.main')

@section('content')
<section class="container-fluid register">
    <img src="{{ asset('img/grafik5.png')}}" class="register-img" alt="">

    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="form-register p-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/logoSemicolon.png')}}" class="mx-auto" alt="">
                </div>

                <form action="{{ route('post.register') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-3">
                        <input type="text" name="email" class="form-control form-custom" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" class="form-control form-custom" placeholder="Password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control form-custom" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="d-flex flex-row justify-content-start align-items-center social">
                            <div class="social-image">
                                <img src="{{ asset('img/google.png') }}" alt="">
                            </div>
                            <a href="#">SIGN UP WITH GOOGLE</a>
                        </div>

                        <div class="d-flex flex-row justify-content-start align-items-center social">
                            <div class="social-image">
                                <img src="{{ asset('img/facebook.png') }}" alt="">
                            </div>
                            <a href="#">SIGN UP WITH FACEBOOK</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn button-login">Daftar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>
@endsection
