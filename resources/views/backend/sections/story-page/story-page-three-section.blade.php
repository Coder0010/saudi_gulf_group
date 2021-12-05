<div class="card">
    <div class="card-header" id="{{ $storyPageThreeSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageThreeSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageThreeSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageThreeSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageThreeSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $storyPageThreeSection->type }}" data-parent="#storyAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storyPageThreeSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $storyPageThreeSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $storyPageThreeSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_description_{{$lang}}">sub_description_{{$lang}}</label>
                        <textarea name="sub_description[{{$lang}}]" id="sub_description_{{$lang}}" class="form-control" rows="3">{{ $storyPageThreeSection->getTranslation('sub_description', $lang) }}</textarea>
                    </div><!-- sub_description -->
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
