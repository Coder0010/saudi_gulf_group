
@extends("layouts.frontend")

@section("title", "services")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => $service->name])

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
                                <p> {!! $service->description !!} </p>
                                @if ($service->sub_description)
                                    <p> {!! $service->sub_description !!} </p>
                                @endif
                                @if($service->pdf)
                                    <a class="btn action" href="{{ $service->pdf }}" target="_blank"> <i class="fa fa-file-download"></i> Download brochure</a>
                                @endif
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
                                <h3>Related portfolios</h3>
                            </div>
                        </div>
                        <div class="owl-carousel portfolio-carousel">
                            @foreach ($service->portfolios as $item)
                                <a href="{{ route('frontend.portfolios.show', $item) }}" class="prtfolio-item">
                                    <img src="{{ $item->image }}" class="img-fluid">
                                    <span>{{ $item->category }}</span>
                                    <div class="item-info">
                                        <h3>{{ $item->name }}</h3>
                                        <p>{{ $item->location }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if (count($service->clients))
                <div class="clients">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Our work Related Clients</h3>
                            </div>
                        </div>
                        <div class="owl-carousel clients-carousel">
                            @foreach ($service->clients as $item)
                                <div class="item">
                                    <img src="{{ $item->image }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @include('frontend.partials.intersed')
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
