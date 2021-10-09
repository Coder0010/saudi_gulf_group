@extends("layouts.backend")

@section("content")
    <div class="container">
        <div class="accordion" id="accordionExample">
            @include("backend.sections.welcome-section", ["isShowed" => "shows"])
            @include("backend.sections.coupon-section", ["isShowed" => "shows"])
            @include("backend.sections.story-section", ["isShowed" => "shows"])
            @include("backend.sections.services-section", ["isShowed" => "shows"])
            @include("backend.sections.portfolios-section", ["isShowed" => "show"])
        </div>
    </div>
@endsection
