<div class="card">
    <div class="card-header" id="{{ $serviceSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $serviceSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $serviceSection->type }}">
                {{ $serviceSection->type }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $serviceSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $serviceSection->type }}" data-parent="#accordionExample">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $serviceSection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $serviceSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <div id="service_section_description_editor">{!! $serviceSection->description !!}</div>
                </div><!-- description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
