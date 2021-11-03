<div class="card">
    <div class="card-header" id="{{ $integratedSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $integratedSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $integratedSection->type }}">
                {{ str_replace('-', ' ', Str::title($integratedSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $integratedSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $integratedSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $integratedSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $integratedSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $integratedSection->description }}</textarea>
                </div><!-- description -->
                <div class="accordion col-md-12" id="integratedSectionCards">
                    @for ($i = 0; $i <= 2; $i++)
                        <div class="card">
                            <div class="card-header" id="{{$i}}">
                                <h2 class="mb-0">
                                    <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$i}}" aria-expanded="false" aria-controls="collapse-{{$i}}">
                                        card {{$i+1}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse-{{$i}}" class="collapse {{ $i == 0 ? 'show' : '' }}" aria-labelledby="{{$i}}" data-parent="#integratedSectionCards">
                                <div class="form-row col-md-12 mb-1">
                                    <div class="form-group col-md-12">
                                        <textarea name="data[{{$i}}]" class="form-control" rows="3">{{ $integratedSection->data[$i] }}</textarea>
                                    </div><!-- data -->
                                    <div class="form-group col-md-12">
                                        <label for="integrated_card_image_{{$i}}">image</label>
                                        <input type="file" name="integrated_card_image_{{$i}}" id="integrated_card_image_{{$i}}" class="form-control">
                                    </div><!-- image -->
                                    @if ($integratedSection->getModelMedia("integrated_card_image_{$i}"))
                                        <div class="form-group col-md-12">
                                            <img src="{{ $integratedSection->getModelMedia("integrated_card_image_{$i}") }}" width="100%" height="250px"/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endfor
                </div><!-- cards -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
