<div class="card">
    <div class="card-header" id="{{ $portfolioSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $portfolioSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $portfolioSection->type }}">
                {{ str_replace('-', ' ', Str::title($portfolioSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $portfolioSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $portfolioSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $portfolioSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $portfolioSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="sub_name">sub_name</label>
                    <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="sub_name" value="{{ $portfolioSection->sub_name }}">
                </div><!-- sub_name -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
