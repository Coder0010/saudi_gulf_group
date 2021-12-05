<div class="card">
    <div class="card-header" id="{{ $couponSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $couponSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $couponSection->type }}">
                {{ str_replace('-', ' ', Str::title($couponSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $couponSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $couponSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $couponSection->type }}">
                <div class="form-group col-md-12">
                    <label for="is_enabled">is_enabled</label>
                    <select name="is_enabled" id="is_enabled" class="form-control">
                        <option value="yes" {{ $couponSection->is_enabled == 'yes' ? 'selected' : '' }}> yes </option>
                        <option value="no"  {{ $couponSection->is_enabled == 'no' ? 'selected' : '' }}> no </option>
                    </select>
                </div><!-- is_enabled -->
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $couponSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_name_{{$lang}}">sub_name_{{$lang}}</label>
                        <input type="text" name="sub_name[{{$lang}}]" id="sub_name{{ $lang }}" class="form-control" placeholder="sub_name_{{$lang}}" value="{{ $couponSection->getTranslation('sub_name', $lang) }}">
                    </div><!-- sub_name -->
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
