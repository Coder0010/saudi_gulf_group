<div class="card">
    <div class="card-header" id="{{ $welcomeSection->type }}">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $welcomeSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $welcomeSection->type }}">
                {{ $welcomeSection->type }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $welcomeSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $welcomeSection->type }}" data-parent="#accordionExample">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update', $welcomeSection->type) }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $welcomeSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <div id="welcome_section_description_editor">{!! $welcomeSection->description !!}</div>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="services">services</label>
                    <select id="services" class="select-2 form-control" name="services[]" multiple="multiple">
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div><!-- services -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $("#services").val( @json($selected_services) ).trigger("change");
    };
</script>
