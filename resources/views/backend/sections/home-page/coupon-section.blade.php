<div class="card">
    <div class="card-header" id="{{ $couponSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $couponSection->type }}" aria-expanded="false" aria-controls="collapse-{{ $couponSection->type }}">
                {{ str_replace('-', ' ', Str::title($couponSection->type)) }}
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $couponSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }} border border-info" aria-labelledby="{{ $couponSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $couponSection->type }}">
                <div class="form-group col-md-12">
                    <label for="is_enabled">is_enabled</label>
                    <select name="is_enabled" id="is_enabled" class="form-control">
                        <option value="yes" {{ $couponSection->is_enabled == 'yes' ? 'selected' : '' }}> yes </option>
                        <option value="no"  {{ $couponSection->is_enabled == 'no' ? 'selected' : '' }}> no </option>
                    </select>
                </div><!-- is_enabled -->
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $couponSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12">
                    <label for="sub_name">sub name</label>
                    <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="sub name" value="{{ $couponSection->sub_name }}">
                </div><!-- sub_name -->
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
