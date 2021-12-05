<div class="card">
    <div class="card-header" id="{{ $familySection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $familySection->type }}" aria-expanded="false" aria-controls="collapse-{{ $familySection->type }}">
                {{ str_replace('-', ' ', Str::title($familySection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $familySection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $familySection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $familySection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $familySection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $familySection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                <div class="form-group col-md-12">
                    <label for="video">video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video/*">
                </div><!-- video -->
                @if ($familySection->video)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <video autoplay controls loop width="250px">
                            <source src="{{ $familySection->video }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
