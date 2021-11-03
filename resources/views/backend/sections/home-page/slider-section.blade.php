<div class="card">
    <div class="card-header" id="{{ $sliderSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $sliderSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $sliderSection->type }}">
                {{ str_replace('-', ' ', Str::title($sliderSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $sliderSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $sliderSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $sliderSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $sliderSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="sub_name">sub name</label>
                    <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="sub name" value="{{ $sliderSection->sub_name }}">
                </div><!-- sub_name -->
                <div class="form-group col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $sliderSection->description }}</textarea>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="services">services</label>
                    <select id="services" class="select-2 form-control" name="services[]" multiple="multiple">
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div><!-- services -->
                <div class="form-group col-md-12">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div><!-- image -->
                @if ($sliderSection->image)
                    <div class="form-group col-md-12">
                        <img src="{{ $sliderSection->image }}" width="100%" height="250px"/>
                    </div>
                @endif
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
