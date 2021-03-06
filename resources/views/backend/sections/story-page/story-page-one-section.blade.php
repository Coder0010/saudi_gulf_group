<div class="card">
    <div class="card-header" id="{{ $storyPageOneSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageOneSection->type }}" aria-expanded="trye" aria-controls="collapse-{{ $storyPageOneSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageOneSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageOneSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $storyPageOneSection->type }}" data-parent="#storyAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storyPageOneSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $storyPageOneSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                <div class="form-group col-md-12">
                    <label for="video">video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video/*">
                </div><!-- video -->
                @if ($storyPageOneSection->video)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <video autoplay controls loop width="250px">
                            <source src="{{ $storyPageOneSection->video }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
