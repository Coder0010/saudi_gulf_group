
@extends("layouts.frontend")

@section("title", "portfolios")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('frontend.index') }}">Home</a>
                        <a href="{{ route('frontend.portfolios.index') }}">Portfolios</a>
                        <p>{{ $portfolio->name }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="inner-page">
            <div class="portfolio-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="portfolio-info">
                                <h3>{{ $portfolio->name }}</h3>
                                <span class="category">{{ $portfolio->category }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-content-center flex-wrap">
                            <div class="portfolio-location">
                                <span><i class="fa fa-map-marker-alt"></i>{{ $portfolio->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="owl-carousel portfolio-item-carousel">
                        <div class="item">
                            <a href="{{ $portfolio->image }}" data-toggle="lightbox" class="prtfolio-item" data-gallery="{{ $portfolio->name }}" class="prtfolio-item">
                                <img src="{{ $portfolio->image }}" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="portfolio-details">
                                {!! $portfolio->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.partials.intersed')
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
