
@extends("layouts.frontend")

@section("title", "services")

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
                        <a href="{{ route('frontend.services.index') }}">services</a>
                        <p>{{ $service->name }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="service-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-big-img">
                                <img src="{{ $service->image }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="service-info">
                                <h3>{{ $service->name }}</h3>
                                {!! $service->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($service->portfolios))
                <div class="related-portfolio">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Our work Related with this service</h3>
                            </div>
                        </div>
                        <div class="owl-carousel portfolio-carousel">
                            @foreach ($service->portfolios as $portfolio)
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
            @endif
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
