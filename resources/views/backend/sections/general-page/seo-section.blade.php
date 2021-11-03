<div class="card">
    <div class="card-header" id="{{ $seoSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $seoSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $seoSection->type }}">
                {{ str_replace('-', ' ', Str::title($seoSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $seoSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $seoSection->type }}" data-parent="#generalAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $seoSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $seoSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="data[description]" id="description" class="form-control" rows="3">{{ @$seoSection->data['description'] }}</textarea>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="keywords">keywords</label>
                    <textarea name="data[keywords]" id="keywords" class="form-control" rows="3">{{ @$seoSection->data['keywords'] }}</textarea>
                </div><!-- description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
