<div class="card">
    <div class="card-header" id="{{ $sliderSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $sliderSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $sliderSection->type }}">
                {{ str_replace('-', ' ', Str::title($sliderSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $sliderSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $sliderSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $sliderSection->type }}">
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="name_{{$lang}}">name_{{$lang}}</label>
                        <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $sliderSection->getTranslation('name', $lang) }}">
                    </div><!-- name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="sub_name_{{$lang}}">sub_name_{{$lang}}</label>
                        <input type="text" name="sub_name[{{$lang}}]" id="sub_name{{ $lang }}" class="form-control" placeholder="sub_name_{{$lang}}" value="{{ $sliderSection->getTranslation('sub_name', $lang) }}">
                    </div><!-- sub_name -->
                @endforeach
                @foreach (config('app.available_locales') as $lang)
                    <div class="form-group col-md-6">
                        <label for="description_{{$lang}}">description_{{$lang}}</label>
                        <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $sliderSection->getTranslation('description', $lang) }}</textarea>
                    </div><!-- description -->
                @endforeach
                <div class="form-group col-md-12">
                    <label for="services">services</label>
                    <select id="services" class="select-2 form-control" name="services[]" multiple="multiple">
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div><!-- services -->
                <div class="form-group col-md-12">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div><!-- image -->
                @if ($sliderSection->image)
                    <div class="form-group col-md-12">
                        <img src="{{ $sliderSection->image }}" width="100%" height="250px"/>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $("#services").val( @json($selected_services) ).trigger("change");
    };
</script>
