
@extends("layouts.frontend")

@section("title", "portfolios")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => 'Portfolios'])

        <section class="inner-page">
            <div class="portfolio-page">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="container">
                                <div class="row">
                                    @forelse ($portfolios as $item)
                                        <div class="col-lg-4">
                                            <a href="{{ route('frontend.portfolios.show', $item) }}" class="prtfolio-item">
                                                <img src="{{ $item->image }}" class="img-fluid">
                                                <span>{{ $item->category }}</span>
                                                <div class="item-info">
                                                    <h3>{{ $item->name }}</h3>
                                                    <p>{{ $item->location }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="col">there is no data</div>
                                    @endforelse
                                </div>
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
