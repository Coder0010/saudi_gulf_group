<form method="POST" action="{{ $route }}" class="form-row p-2" enctype='multipart/form-data'>
    @csrf
    @method($requestType ?? 'post')
    <div class="form-group col-md-12">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $entity ? $entity['name'] : '' }}">
    </div><!-- name -->
    <div class="form-group col-md-12 h-100">
        <label for="description">description</label>
        {{-- <div id="description_editor">{!! $entity ? $entity ? $entity['description'] : '' : '' !!}</div> --}}
        <textarea name="description" id="description" class="form-control" rows="5">{{ $entity ? $entity['description'] : '' }}</textarea>
    </div><!-- description -->
    <div class="form-group col-md-12">
        <label for="image">image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div><!-- image -->
    @if ($entity && isset($entity['image']))
        <div class="form-group col-md-12">
            <img src="{{ $entity['image'] }}" width="100%" height="100px"/>
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
