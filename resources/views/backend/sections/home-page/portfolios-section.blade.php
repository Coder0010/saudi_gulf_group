<div class="card">
    <div class="card-header" id="{{ $portfolioSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $portfolioSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $portfolioSection->type }}">
                {{ str_replace('-', ' ', Str::title($portfolioSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $portfolioSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $portfolioSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $portfolioSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $portfolioSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_name_{{$lang}}">sub_name_{{$lang}}</label>
                        <input type="text" name="sub_name[{{$lang}}]" id="sub_name{{ $lang }}" class="form-control" placeholder="sub_name_{{$lang}}" value="{{ $portfolioSection->getTranslation('sub_name', $lang) }}">
                    </div><!-- sub_name -->
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
