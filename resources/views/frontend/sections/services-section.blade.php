<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="head-title">
                    <span>{{ $serviceSection->sub_name }}</span>
                    <h3> {!! $serviceSection->name !!} </h3>
                </div>
            </div>
        </div>
        <div class="owl-carousel service-carousel">
            @foreach ($services as $service)
                <div class="item">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item-img">
                                    <img src="{{ $service->image }}">
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-content-center flex-wrap">
                                <div class="item-info">
                                    <h3><a href="{{ route('frontend.services.show', $service) }}">{{ $service->name }}</a></h3>
                                    {!! $service->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
