<form method="POST" action="{{ $route }}" class="form-row p-2" enctype='multipart/form-data'>
    @csrf
    @method($requestType ?? 'post')
    <div class="form-group col-md-12">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $entity ? $entity['name'] : '' }}">
    </div><!-- name -->
    {{-- <div class="form-group col-md-12">
        <label for="sub_name">sub_name</label>
        <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="sub_name" value="{{ $entity ? $entity['sub_name'] : '' }}">
    </div><!-- sub_name -->
    <div class="form-group col-md-12">
        <label for="description">description</label>
        <textarea name="description" id="description" class="form-control" rows="3">{{ $entity ? $entity['description'] : '' }}</textarea>
    </div><!-- description -->
    <div class="form-group col-md-12">
        <label for="sub_description">sub_description</label>
        <textarea name="sub_description" id="sub_description" class="form-control" rows="3">{{ $entity ? $entity['sub_description'] : '' }}</textarea>
    </div><!-- sub_description -->
    <div class="form-group col-md-12">
        <label for="image">image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div><!-- image -->
    @if ($entity && !empty($entity['image']))
        <div class="form-group col-md-12">
            <img src="{{ $entity['image'] }}" width="100%" height="250px"/>
        </div>
    @endif --}}
    <div class="accordion col-md-12" id="packageCards">
        @for ($i = 0; $i <= 7; $i++)
            <div class="card">
                <div class="card-header" id="{{$i}}">
                    <h2 class="mb-0">
                        <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$i}}" aria-expanded="false" aria-controls="collapse-{{$i}}">
                            item {{$i+1}}
                        </button>
                    </h2>
                </div>
                <div id="collapse-{{$i}}" class="collapse {{ $i == 0 ? 'show' : '' }}" aria-labelledby="{{$i}}" data-parent="#packageCards">
                    <textarea name="data[{{$i}}]" class="form-control" rows="3">{{ $entity ? @$entity['data'][$i] : '' }}</textarea>
                </div>
            </div>
        @endfor
    </div>
    <button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
