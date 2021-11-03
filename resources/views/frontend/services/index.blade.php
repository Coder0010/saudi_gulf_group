
@extends("layouts.frontend")

@section("title", "services")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => 'Services'])

        <section class="inner-page">
            <div class="portfolio-page">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="container">
                                <div class="row">
                                    @forelse ($services as $item)
                                        <div class="col-lg-4">
                                            <a href="{{ route('frontend.services.show', $item) }}" class="prtfolio-item">
                                                <img src="{{ $item->image }}" class="img-fluid">
                                                <span>{{ $item->name }}</span>
                                                <div class="item-info">
                                                    <h3>{{ $item->name }}</h3>
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
        </section>
        @include('frontend.partials.footer')
    </body>
@endsection
