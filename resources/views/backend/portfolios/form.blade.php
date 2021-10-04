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
    @if (Route::is('portfolios.edit'))
        <div class="form-group col-md-12">
            <img src="{{ $entity->getModelMedia() }}" width="100%" height="100px"/>
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
