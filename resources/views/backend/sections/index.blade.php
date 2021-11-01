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
                    home sections
                </h2>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    @foreach (["welcome-section", "coupon-section", "story-section", "services-section", "portfolios-section", "general-section", "contact-us-section"] as $item)
                        @include("backend.sections.${item}", ["isShowed" => Session::get("type") == $item ? 'isShowed':''])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
