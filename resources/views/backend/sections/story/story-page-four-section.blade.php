<div class="card">
    <div class="card-header" id="{{ $storyPageFourSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $storyPageFourSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $storyPageFourSection->type }}">
                {{ str_replace('-', ' ', Str::title($storyPageFourSection->type)) }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $storyPageFourSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $storyPageFourSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $storyPageFourSection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $storyPageFourSection->name }}">
                </div><!-- name -->
                @for ($i = 0; $i <= 2; $i++)
                    <div class="form-group col-md-12">
                        <label for="data">row {{ $i+1 }}</label>
                        <textarea name="data[{{$i}}]" id="data" class="form-control" rows="5">{{ $storyPageFourSection->data[$i] }}</textarea>
                    </div><!-- data -->
                @endfor
                <div class="form-group col-md-12">
                    <label for="pdf">pdf</label>
                    <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                </div><!-- pdf -->
                @if ($storyPageFourSection->pdf)
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <a href="{{ $storyPageFourSection->pdf }}" target="_blank">download</a>
                    </div>
                @endif
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
