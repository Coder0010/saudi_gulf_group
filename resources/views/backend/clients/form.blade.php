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
    @if (Route::is('clients.edit'))
        <div class="form-group col-md-12">
            <img src="{{ $entity->getModelMedia() }}" width="100%" height="100px"/>
        </div>
    @endif
    <button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
