@extends("layouts.frontend")

@section("title", "home")

@section("content")
    <body class="main">
        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('flashs')

        @include('frontend.sections.slider-section')

        @include('frontend.sections.coupon-section')

        @include('frontend.sections.story-section')

        @include('frontend.sections.services-section')

        @include('frontend.sections.integrated-section')

        @include('frontend.sections.portfolios-section')

        @include('frontend.sections.family-section')

        @include('frontend.partials.footer')
    </body>
@endsection
