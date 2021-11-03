<div class="card">
    <div class="card-header" id="{{ $aboutUsSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $aboutUsSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $aboutUsSection->type }}">
                {{ str_replace('-', ' ', Str::title($aboutUsSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $aboutUsSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $aboutUsSection->type }}" data-parent="#generalAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $aboutUsSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $aboutUsSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $aboutUsSection->description }}</textarea>
                </div><!-- description -->
                @foreach (['facebook', 'instagram'] as $item)
                    <div class="form-group col-md-12">
                        <label for="{{ $item }}">{{ $item }}</label>
                        <input type="url" name="data[{{ $item }}]" id="{{ $item }}" class="form-control" placeholder="{{ $item }}" value="{{ @$aboutUsSection->data[$item] }}">
                    </div>
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
