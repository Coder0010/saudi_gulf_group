<section class="integrated">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="head-title text-center">
                    <h3>{{ $integratedSection->name }}</h3>
                    <p> {!! $integratedSection->description !!} </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($integratedSection->data as $i => $row)
                <div class="col-lg-3">
                    <div class="item">
                        @if ($integratedSection->getModelMedia("integrated_card_image_{$i}"))
                            <div class="form-group col-md-12">
                                <img src="{{ $integratedSection->getModelMedia("integrated_card_image_{$i}") }}"/>
                            </div>
                        @endif
                        <p> {{ @$row[app()->getLocale()] }} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
