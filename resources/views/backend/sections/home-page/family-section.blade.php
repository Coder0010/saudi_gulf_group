<div class="card">
    <div class="card-header" id="{{ $familySection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $familySection->type }}" aria-expanded="false" aria-controls="collapse-{{ $familySection->type }}">
                {{ str_replace('-', ' ', Str::title($familySection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $familySection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $familySection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $familySection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $familySection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $storySection->description }}</textarea>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="video">video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video/*">
                </div><!-- video -->
                @if ($familySection->video)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <video autoplay controls loop width="250px">
                            <source src="{{ $familySection->video }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
