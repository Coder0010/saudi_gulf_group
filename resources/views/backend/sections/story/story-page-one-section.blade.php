<div class="card">
    <div class="card-header" id="{{ $storyPageOneSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageOneSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageOneSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageOneSection->type)) }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageOneSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $storyPageOneSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $storyPageOneSection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="name" name="name" name="name" class="form-control" value="{{ $storyPageOneSection->type }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="video">video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video">
                </div><!-- video -->
                @if ($storyPageOneSection->video)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <video autoplay controls loop width="250px">
                            <source src="{{ $storyPageOneSection->video }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
