<div class="card">
    <div class="card-header" id="{{ $storySection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storySection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storySection->type }}">
                {{ str_replace('-', ' ', Str::title($storySection->type)) }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storySection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $storySection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $storySection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $storySection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="sub_name">sub name</label>
                    <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="sub name" value="{{ $storySection->sub_name }}">
                </div><!-- sub_name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $storySection->description }}</textarea>
                </div><!-- description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
