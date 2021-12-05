
@extends("layouts.frontend")

@section("title", "our story")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => __('translate.our-story')])

        <section class="inner-page">
            <div class="story-page">
                <div class="container">
                    @if ($storyPageOneSection->video)
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="story-video">
                                    <video autoplay controls loop>
                                        <source src="{{ $storyPageOneSection->video }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <h3>{{ $storyPageTwoSection->name }}</h3>
                            <p>{{ $storyPageTwoSection->description }}</p>
                            <p>{{ $storyPageTwoSection->sub_description }}</p>

                            <h3>{{ $storyPageThreeSection->name }}</h3>
                            <p>{{ $storyPageThreeSection->description }}</p>
                            <p>{{ $storyPageThreeSection->sub_description }}</p>

                            <h3>{{ $storyPageFourSection->name }}</h3>
                            @foreach ($storyPageFourSection->data as $row)
                                <p>
                                    <i class="fa fa-check-circle"></i>
                                    {{ $row }}
                                </p>
                            @endforeach
                            @if($storyPageFourSection->pdf)
                                <a class="btn action" href="{{ $storyPageFourSection->pdf }}" target="_blank"> <i class="fa fa-file-download"></i> Download profile company</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
