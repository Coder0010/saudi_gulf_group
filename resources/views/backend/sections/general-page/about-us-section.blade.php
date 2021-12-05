<div class="card">
    <div class="card-header" id="{{ $aboutUsSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $aboutUsSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $aboutUsSection->type }}">
                {{ str_replace('-', ' ', Str::title($aboutUsSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $aboutUsSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $aboutUsSection->type }}" data-parent="#generalAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $aboutUsSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $aboutUsSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $aboutUsSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                @foreach (['facebook', 'instagram'] as $item)
                    <div class="form-group col-md-12">
                        <label for="{{ $item }}">{{ $item }}</label>
                        <input type="url" name="data[{{ $item }}]" id="{{ $item }}" class="form-control" placeholder="{{ $item }}" value="{{ @$aboutUsSection->data[$item] }}">
                    </div>
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
