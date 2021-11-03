<header class="d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex align-content-center flex-wrap">
                <div class="header-content">
                    <p>{{ $sliderSection->name }}</p>
                    <h1>{{ $sliderSection->sub_name }}</h1>
                    <span> {!! $sliderSection->description !!} </span>
                    <a href="{{ route('frontend.services.index') }}" class="action">services</a>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-content-center flex-wrap p-4">
                <div class="header-img">
                    <img src="{{ $sliderSection->image }}">
                    @if ($selected_services)
                        @foreach ($selected_services as $key => $service)
                            <a href="{{ route('frontend.services.show', $service) }}" class="span{{ $key+1 }}">{{ $service->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
