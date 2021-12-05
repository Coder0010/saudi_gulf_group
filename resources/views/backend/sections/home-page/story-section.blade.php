<div class="card">
    <div class="card-header" id="{{ $storySection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storySection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storySection->type }}">
                {{ str_replace('-', ' ', Str::title($storySection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storySection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $storySection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storySection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $storySection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_name_{{$lang}}">sub_name_{{$lang}}</label>
                        <input type="text" name="sub_name[{{$lang}}]" id="sub_name{{ $lang }}" class="form-control" placeholder="sub_name_{{$lang}}" value="{{ $storySection->getTranslation('sub_name', $lang) }}">
                    </div><!-- sub_name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $storySection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                <div class="form-group col-md-12">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div><!-- image -->
                @if ($storySection->image)
                    <div class="form-group col-md-12">
                        <img src="{{ $storySection->image }}" width="100%" height="250px"/>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
