<form method="POST" action="{{ $route }}" class="form-row p-2" enctype='multipart/form-data'>
    @csrf
    @method($requestType ?? 'post')
    <div class="form-group col-md-12">
        <input type="text" name="name" class="form-control" placeholder="name" value="{{ $entity ? $entity['name'] : '' }}">
    </div><!-- name -->
    <div class="form-group col-md-12">
        <textarea name="description" class="form-control" placeholder="description" cols="30" rows="10">{{ $entity ? $entity['description'] : '' }}</textarea>
    </div><!-- description -->
    <div class="form-group col-md-12">
        <input type="file" name="image" class="form-control" placeholder="image">
    </div><!-- image -->
    <div class="form-group col-md-12">
        <label for="clients">clients</label>
        <select class="select-2" id="clients" name="clients[]" multiple="multiple">
            @foreach ($clients as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div><!-- clients -->
    <div class="form-group col-md-12">
        <label for="portfolios">portfolios</label>
        <select class="select-2" id="portfolios" name="portfolios[]" multiple="multiple">
            @foreach ($portfolios as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div><!-- portfolios -->
    @if (Route::is('services.edit'))
        <div class="form-group col-md-12">
            <img src="{{ $entity->getModelMedia() }}" width="100%" height="100px"/>
        </div>
    @endif
    <button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
