<div class="card">
    <div class="card-header" id="{{ $storyPageTwoSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageTwoSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageTwoSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageTwoSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageTwoSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $storyPageTwoSection->type }}" data-parent="#storyAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storyPageTwoSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $storyPageTwoSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $storyPageTwoSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_description_{{$lang}}">sub_description_{{$lang}}</label>
                        <textarea name="sub_description[{{$lang}}]" id="sub_description_{{$lang}}" class="form-control" rows="3">{{ $storyPageTwoSection->getTranslation('sub_description', $lang) }}</textarea>
                    </div><!-- sub_description -->
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
