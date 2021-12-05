<div class="card">
    <div class="card-header" id="{{ $contactUsSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed  btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $contactUsSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $contactUsSection->type }}">
                {{ str_replace('-', ' ', Str::title($contactUsSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $contactUsSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $contactUsSection->type }}" data-parent="#generalAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $contactUsSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $contactUsSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $contactUsSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="address_{{$lang}}">address_{{$lang}}</label>
                        <textarea name="data[address][{{$lang}}]" id="address_{{$lang}}" class="form-control" rows="3">{{ @$contactUsSection->data['address'][$lang] }}</textarea>
                    </div><!-- address -->
                @endforeach
                <div class="form-group col-md-12">
                    <label for="work_time">work_time</label>
                    <input type="text" name="data[work_time]" id="work_time" class="form-control" placeholder="work_time" value="{{ @$contactUsSection->data['work_time'] }}">
                </div><!-- work_time -->
                @foreach (['phone_1', 'phone_2'] as $item)
                    <div class="form-group col-md-12">
                        <label for="{{ $item }}">{{ $item }}</label>
                        <input type="text" name="data[{{ $item }}]" id="{{ $item }}" class="form-control" placeholder="{{ $item }}" value="{{ @$contactUsSection->data[$item] }}">
                    </div>
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
