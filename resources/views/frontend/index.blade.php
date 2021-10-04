@extends("layouts.frontend")

@section("title", "home")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        <header class="d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 d-flex align-content-center flex-wrap">
                        <div class="header-content">
                            <p>keep calm and relax</p>
                            <h1>No more searching for companies</h1>
                            <span>No more fuss, We provide you all the services your home needs, quality to your liking, at
                                competitive prices</span>
                            <a href="#" class="action">discover our services</a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-content-center flex-wrap p-4">
                        <div class="header-img">
                            <img src="frontend/images/header-img.png">
                            <a href="#" class="span1">Housekeeping</a>
                            <a href="#" class="span2">Renting After Development</a>
                            <a href="#" class="span3">Maintenance</a>
                            <a href="#" class="span4">Real Estate Management</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('frontend.sections.get-discount')

        @include('frontend.sections.story')

        @include('frontend.sections.services')

        <section class="integrated">
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
        </section>

        @include('frontend.sections.potfolio')

        <section class="video">
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
        </section>

        @include('frontend.partials.footer')

    </body>
@endsection
