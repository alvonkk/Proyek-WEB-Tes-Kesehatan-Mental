@extends('layout.main')

@section('content')
<section class="hero">
    <div class="row">
        <div class="col-md-6">
            <div class="tagline">
                <h3>Have you Find<br/> your reason to smile today? ^^</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 hero-image-1">
            <img loading="lazy" srcset="{{ asset('img/homepage.png') }}" />
        </div>

        <div class="col-md-3 hero-image-2">
            <img loading="lazy" srcset="{{ asset('img/homepage1.png') }}"/>
        </div>

        <div class="col-md-3 hero-image-3">
            <img loading="lazy" srcset="{{ asset('img/homepage2.png') }}"/>
        </div>

        <div class="col-md-3 hero-image-4">
            <img loading="lazy" srcset="{{ asset('img/homepage3.png') }}"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 hero-image-5">
            <img loading="lazy" srcset="{{ asset('img/homepage4.png') }}" />
        </div>

        <div class="col-md-3 hero-image-6">
            <img loading="lazy" srcset="{{ asset('img/homepage5.png') }}" />
        </div>

        <div class="col-md-3 hero-image-7">
            <img loading="lazy" srcset="{{ asset('img/homepage6.png') }}" />
        </div>

        <div class="col-md-3 hero-image-8">
            <img loading="lazy" srcset="{{ asset('img/homepage7.png') }}" />
        </div>
    </div>

    <img class="hero-grafik" loading="lazy" srcset="{{ asset('img/grafik2.png') }}" />
</section>


<section class="service">
    <div class="container">
        <h1>WHAT WE SERVE</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-center p-5">
                <div class="mental">
                    <img loading="lazy" srcset="{{ asset('img/homepageList.png') }}" />
                    <h4>Mental Health Test</h4>
                    <p>Our website provides various test features that will help you analyze and serve as a benchmark for your problems related to mental problems</p>
                </div>
            </div>

            <div class="col-md-4 text-center p-5">
                <div class="counseling">
                    <img loading="lazy" srcset="{{ asset('img/homepageCounseling.png') }}" />
                    <h4>Counseling</h4>
                    <p>Our website provides counseling services that are directly supervised by experts who are ready to help you solve your mental problems</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-3">
                <img loading="lazy" srcset="{{ asset('img/logoSemicolon.png') }}" />
            </div>
            <div class="col-md-3">
                <h4>Important Link</h4>
                <ul>
                    <li>WHO WE SERVE</li>
                    <li>PRODUCTS</li>
                    <li>WHAT WE DO</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Important Link</h4>
                <ul>
                    <li>GET A QUOTE</li>
                    <li>CONTACT US</li>
                    <li>ISO CERTIFICATION</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Get In Touch</h4>
                <ul>
                    <li class="fw-bold"><i class="fa fa-phone"></i> 082252734105 (Haezer)</li>
                    <li class="fw-bold"><i class="fa fa-phone"></i> 085641006269</li>
                    <li class="fw-bold"><i class="fa fa-envelope"></i> semicolon087@gmail.com</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>&copy; Copyright - PT. SemiColon Indonesia</p>
    </div>
</footer>

@endsection
