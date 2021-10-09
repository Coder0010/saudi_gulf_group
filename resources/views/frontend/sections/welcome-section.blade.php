<header class="d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex align-content-center flex-wrap">
                <div class="header-content">
                    <p>{{ $welcomeSection->name }}</p>
                    <p> {!! $welcomeSection->description !!} </p>
                    <a href="route('frontend.services.index')" class="action">services</a>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-content-center flex-wrap p-4">
                <div class="header-img">
                    <img src="frontend/images/header-img.png">
                    @foreach ($selected_services as $key => $service)
                        <a href="route('frontend.services.show', $service)" class="span{{ $key+1 }}">{{ $service->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>
