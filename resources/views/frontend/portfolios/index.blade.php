
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
                        <a href="{{ route('frontend.index') }}">Home </a>
                        <p>Portfolio</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="inner-page">
            <div class="portfolio-page">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="container">
                                <div class="row">
                                    @foreach ($portfolios as $portfolio)
                                        <div class="col-lg-4">
                                            <a href="{{ route('frontend.portfolios.show', $portfolio) }}" class="prtfolio-item">
                                                <img src="{{ $portfolio->image }}" class="img-fluid">
                                                <span>{{ $portfolio->category }}</span>
                                                <div class="item-info">
                                                    <h3>{{ $portfolio->name }}</h3>
                                                    <p>{{ $portfolio->location }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="interest">
                <img src="images/interest.png">
                <h1>Interested?</h1>
                <a href="#">Contact us</a>
            </div>
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
