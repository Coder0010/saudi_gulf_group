@php
    if ($entity):
        $entity = json_decode($entity, true);
    else:
        $entity = [];
    endif;
@endphp
<form method="POST" action="{{ $route }}" class="form-row p-2" enctype='multipart/form-data'>
    @csrf
    @method($requestType ?? 'post')
    @foreach (config('app.available_locales') as $lang)
        <div class="form-group col-md-6">
            <label for="name_{{$lang}}">name_{{$lang}}</label>
            <input type="text" name="name[{{$lang}}]" id="name_{{ $lang }}" class="form-control" placeholder="name_{{$lang}}" value="{{ $entity ? @$entity['name'][$lang] : '' }}">
        </div><!-- name -->
    @endforeach
    @foreach (config('app.available_locales') as $lang)
        <div class="form-group col-md-6">
            <label for="description_{{$lang}}">description_{{$lang}}</label>
            <textarea name="description[{{$lang}}]" id="description_{{$lang}}" class="form-control" rows="3">{{ $entity ? @$entity['description'][$lang] : '' }}</textarea>
        </div><!-- description -->
    @endforeach
    @foreach (config('app.available_locales') as $lang)
        <div class="form-group col-md-6">
            <label for="sub_description_{{$lang}}">sub_description_{{$lang}}</label>
            <textarea name="sub_description[{{$lang}}]" id="sub_description_{{$lang}}" class="form-control" rows="3">{{ $entity ? @$entity['sub_description'][$lang] : '' }}</textarea>
        </div><!-- sub_description -->
    @endforeach
    <div class="form-group col-md-12">
        <label for="pdf">pdf</label>
        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
    </div><!-- pdf -->
    @if ($entity && !empty($entity['pdf']))
        <div class="form-group col-md-12 d-flex justify-content-center">
            <a href="{{ $entity['pdf'] }}" target="_blank">download</a>
        </div>
    @endif
    <div class="form-group col-md-12">
        <label for="image">image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div><!-- image -->
    @if ($entity && !empty($entity['image']))
        <div class="form-group col-md-12">
            <img src="{{ $entity['image'] }}" width="100%" height="250px"/>
        </div>
    @endif
    <div class="form-group col-md-12">
        <label for="clients">clients</label>
        <select id="clients" class="select-2 form-control" name="clients[]" multiple="multiple">
            @foreach ($clients as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div><!-- clients -->
    <div class="form-group col-md-12">
        <label for="portfolios">portfolios</label>
        <select id="portfolios" class="select-2 form-control" name="portfolios[]" multiple="multiple">
            @foreach ($portfolios as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div><!-- portfolios -->
    <button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
