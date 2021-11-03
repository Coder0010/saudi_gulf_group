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
        <h1> {{ Session::get('type') }} </h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-sections-tab" data-toggle="tab" href="#general-sections" role="tab" aria-controls="general-sections" aria-selected="true">
                    general-sections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="home-page-sections-tab" data-toggle="tab" href="#home-page-sections" role="tab" aria-controls="home-page-sections" aria-selected="false">
                    home-page-sections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="story-page-sections-tab" data-toggle="tab" href="#story-page-sections" role="tab" aria-controls="story-page-sections" aria-selected="false">
                    story-page-sections
                </a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="general-sections" role="tabpanel" aria-labelledby="general-sections-tab">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="card-title m-0">
                            general-sections
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="generalAccordion">
                            @foreach (["seo-section", "about-us-section", "contact-us-section"] as $item)
                                @include('backend.sections.general-page.'.$item, ["isShowed" => Session::get("type") == $item ? 'isShowed':''])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="home-page-sections" role="tabpanel" aria-labelledby="home-page-sections-tab">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="card-title m-0">
                            home-page-sections
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="homeAccordion">
                            @foreach (["slider-section", "coupon-section", "story-section", "services-section", "integrated-section", "family-section", "portfolios-section",] as $item)
                                @include('backend.sections.home-page.'.$item, ["isShowed" => Session::get("type") == $item ? 'isShowed':''])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="story-page-sections" role="tabpanel" aria-labelledby="story-page-sections-tab">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="card-title m-0">
                            story-page-sections
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="storyAccordion">
                            @foreach (["story-page-one-section", "story-page-two-section", "story-page-three-section", "story-page-four-section"] as $item)
                                @include('backend.sections.story-page.'.$item, ["isShowed" => Session::get("type") == $item ? 'isShowed':''])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
