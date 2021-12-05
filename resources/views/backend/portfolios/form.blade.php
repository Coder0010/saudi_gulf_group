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
        <input type="text" name="category" class="form-control" placeholder="category" value="{{ $entity ? $entity['category'] : 'general' }}">
    </div><!-- category -->
    <div class="form-group col-md-12">
        <input type="text" name="location" class="form-control" placeholder="location" value="{{ $entity ? $entity['location'] : 'egypt' }}">
    </div><!-- location -->
    <button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
