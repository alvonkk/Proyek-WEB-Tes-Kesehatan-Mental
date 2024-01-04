@extends('layout.main')

@section('content')
<section class="container-fluid login">
    <div class="row">
        <div class="col-md-8 text-center">
            <h2 class="pb-2">Have you found reasons<br/> to smile today? ^_^</h2>

            <img src="{{ asset('img/image4.png')}}" class="mx-auto login-img-left" alt="">

            <img src="{{ asset('img/grafik3.png')}}" class="mx-auto login-img-left" alt="">

        </div>
        <div class="col-md-4 px-4">
            <div class="form-login">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/logoSemicolon.png')}}" class="mx-auto" alt="">
                </div>

                <form action="{{ route('post.login')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-3">
                        <input type="text" name="email" class="form-control form-custom" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-custom" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn button-login">LOGIN</button>
                    </div>
                    <div class="form-group">
                        <p>Tidak Punya Akun? <a href="{{ route('register') }}">Buat Akun</a></p>
                    </div>
                </form>
            </div>

            <img src="{{ asset('img/grafik4.png')}}" class="login-image" alt="">
        </div>
    </div>
</section>
@endsection
