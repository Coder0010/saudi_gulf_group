@extends("layouts.frontend")

@section("title", "home")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('flashs')

        @include('frontend.sections.welcome-section')

        @include('frontend.sections.coupon-section')

        @include('frontend.sections.story-section')

        @include('frontend.sections.services-section')

        {{-- <section class="integrated">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="head-title text-center">
                            <h3>Integrated Facility Management And Maintenance Services</h3>
                            <p>We pledge to establish lasting partnership relations with our clients and gain their
                                confidence through our experience and our exceptional team.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-lg-3">
                        <div class="item">
                            <img src="frontend/images/engineers.svg">
                            <p>Qualified Team of Engineers & Experts</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item">
                            <img src="frontend/images/portfolio.svg">
                            <p>Solid portfolio across KSA and Egypt</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item">
                            <img src="frontend/images/finance.svg">
                            <p>Innovative Solutions to Time/Budget Challenges</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        @include('frontend.sections.portfolios-section')

        {{-- <section class="video">
            <video autoplay muted loop class="sg-video">
                <source src="images/SG03.mp4" type="video/mp4">
            </video>
            <div class="overlay text-center">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1>We are not a company, We are Family</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. </p>
                        <a href="#">Get your qutation</a>
                    </div>
                </div>
            </div>
        </section> --}}

        @include('frontend.partials.footer')

    </body>
@endsection
