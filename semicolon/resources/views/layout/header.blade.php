<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEMICOLON</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}" >
</head>
<body>
    <img class="navbar-grafik" loading="lazy" srcset="{{ asset('img/grafik1.png') }}" />
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('img/logoSemicolon.png') }}" width="270" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @auth
                    @if(auth()->user()->role == 'client')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('dashboard')}}">Mental Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('counseling')}}">Counseling</a>
                        </li>
                    @elseif(auth()->user()->role == 'konselor')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('jadwal.index')}}">Atur Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('informasi.index')}}">Informasi Client</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('dashboard')}}">Statistik</a>
                    </li>
                    @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard')}}">Mental Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('counseling')}}">Counseling</a>
                </li>
                @endauth
            </ul>
            <div class="button-primary">
                @auth
                    @if(auth()->user()->role != 'admin')
                    <a href="{{ route('profile.index') }}" class="button-profile"><i class="fa-solid fa-circle-user"></i></a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf <!-- CSRF Token -->
                        @method('POST')
                        <button type="submit" class="btn button-logout" style="border: none; cursor: pointer;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="button-primary-link">Sign Up</a>
                    <a href="{{ route('login') }}" class="button-primary-link">Log In</a>
                @endauth
            </div>
          </div>
        </div>
    </nav>
