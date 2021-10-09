<div class="card">
    <div class="card-header" id="{{ $portfolioSection->type }}">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $portfolioSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $portfolioSection->type }}">
                {{ $portfolioSection->type }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $portfolioSection->type }}" class="collapse {{ $isShowed }}" aria-labelledby="{{ $portfolioSection->type }}" data-parent="#accordionExample">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $portfolioSection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $portfolioSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <div id="portfolio_section_description_editor">{!! $portfolioSection->description !!}</div>
                </div><!-- description -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
