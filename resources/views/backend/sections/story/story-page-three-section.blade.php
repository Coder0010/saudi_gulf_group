<div class="card">
    <div class="card-header" id="{{ $storyPageThreeSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageThreeSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageThreeSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageThreeSection->type)) }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageThreeSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $storyPageThreeSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storyPageThreeSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $storyPageThreeSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $storyPageThreeSection->description }}</textarea>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="sub_description">sub description</label>
                    <textarea name="sub_description" id="sub_description" class="form-control" rows="5">{{ $storyPageThreeSection->sub_description }}</textarea>
                </div><!-- sub_description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
