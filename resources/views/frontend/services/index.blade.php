
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
                        <a href="{{ route('frontend.index') }}">Home </a>
                        <p>Services</p>
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
                                    @foreach ($services as $service)
                                        <div class="col-lg-4">
                                            <a href="{{ route('frontend.services.show', $service) }}" class="prtfolio-item">
                                                <img src="{{ $service->image }}" class="img-fluid">
                                                <span>{{ $service->name }}</span>
                                                <div class="item-info">
                                                    <h3>{{ $service->name }}</h3>
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
        </section>
        @include('frontend.partials.footer')
    </body>
@endsection
