<div class="card">
    <div class="card-header" id="{{ $storySection->type }}">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storySection->type }}" aria-expanded="true" aria-controls="collapse-{{ $storySection->type }}">
                {{ $storySection->type }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storySection->type }}" class="collapse {{ $isShowed }}" aria-labelledby="{{ $storySection->type }}" data-parent="#accordionExample">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $storySection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $storySection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <div id="story_section_description_editor">{!! $storySection->description !!}</div>
                </div><!-- description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
