
@extends("layouts.frontend")

@section("title", "packages")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => 'packages'])

        <section class="inner-page">
            <div class="prices-page">
                <div class="container">
                    <div class="row justify-content-center">
                        @forelse ($packages as $item)
                            <div class="col-lg-4">
                                <div class="price-item">
                                    <h3>{{ $item->name }}</h3>
                                    @foreach ($item->data as $row)
                                        <div class="package-info">
                                            @if ($row)
                                                <p><i class="far fa-check-circle"></i> {{ $row }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <div class="col">there is no data</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
