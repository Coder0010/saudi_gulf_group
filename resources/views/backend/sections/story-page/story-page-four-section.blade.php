<div class="card">
    <div class="card-header" id="{{ $storyPageFourSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageFourSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageFourSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageFourSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageFourSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $storyPageFourSection->type }}" data-parent="#storyAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storyPageFourSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $storyPageFourSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                <div class="accordion col-md-12" id="storyPageFourSectionCards">
                    @for ($i = 0; $i <= 2; $i++)
                        <div class="card">
                            <div class="card-header" id="{{$i}}">
                                <h2 class="mb-0">
                                    <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$i}}" aria-expanded="false" aria-controls="collapse-{{$i}}">
                                        card {{$i+1}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse-{{$i}}" class="collapse {{ $i == 0 ? 'show' : '' }}" aria-labelledby="{{$i}}" data-parent="#storyPageFourSectionCards">
                                <div class="form-row col-md-12 mb-1">
                                    @foreach (config('app.available_locales') as $lang)
                                        <div class="form-group col-md-6">
                                            <textarea name="data[{{$i}}][{{$lang}}]" class="form-control" rows="3">{{ @$storyPageFourSection->data[$i][$lang] }}</textarea>
                                        </div><!-- data -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group col-md-12">
                    <label for="pdf">pdf</label>
                    <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                </div><!-- pdf -->
                @if ($storyPageFourSection->pdf)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <a href="{{ $storyPageFourSection->pdf }}" target="_blank">download</a>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
