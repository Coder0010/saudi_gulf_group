<form method="POST" action="{{ $route }}" class="form-row p-2" enctype='multipart/form-data'>
    @csrf
    @method($requestType ?? 'post')
    <div class="form-group col-md-12">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $entity ? $entity['name'] : '' }}">
    </div><!-- name -->
    <div class="form-group col-md-12">
        <label for="description">description</label>
        <textarea name="description" id="description" class="form-control" rows="3">{{ $entity ? $entity['description'] : '' }}</textarea>
    </div><!-- description -->
    <div class="form-group col-md-12">
        <label for="image">image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div><!-- image -->
    @if ($entity && isset($entity['image']))
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
