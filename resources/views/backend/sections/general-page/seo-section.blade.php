<div class="card">
    <div class="card-header" id="{{ $seoSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $seoSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $seoSection->type }}">
                {{ str_replace('-', ' ', Str::title($seoSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $seoSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $seoSection->type }}" data-parent="#generalAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $seoSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $seoSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $seoSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="keywords_{{$lang}}">keywords_{{$lang}}</label>
                        <textarea name="data[keywords][{{$lang}}]" id="keywords_{{$lang}}" class="form-control" rows="3">{{ @$seoSection->data['keywords'][$lang] }}</textarea>
                    </div><!-- keywords -->
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
