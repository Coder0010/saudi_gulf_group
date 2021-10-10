@extends("layouts.backend")

@section("css")
    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
        }
        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }
    </style>
@endsection

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h2 class="card-title m-0">
                    header
                </h2>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    @include("backend.sections.welcome-section", ["isShowed" => true])
                    @include("backend.sections.coupon-section")
                    @include("backend.sections.story-section")
                    @include("backend.sections.services-section")
                    @include("backend.sections.portfolios-section")
                </div>
            </div>
        </div>
    </div>
@endsection
