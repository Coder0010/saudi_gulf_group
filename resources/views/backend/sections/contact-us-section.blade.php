<div class="card">
    <div class="card-header" id="{{ $contactUsSection->type }}">
        <h2 class="mb-0">
            <button class="collapsed  btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $contactUsSection->type }}" aria-expanded="true" aria-controls="collapse-{{ $contactUsSection->type }}">
                {{ str_replace('-', ' ', Str::title($contactUsSection->type)) }}
                <i class="fa float-right" aria-hidden="true"></i>
            </button>
        </h2>
    </div>
    <div id="collapse-{{ $contactUsSection->type }}" class="collapse {{ @$isShowed ? 'show' : '' }}" aria-labelledby="{{ $contactUsSection->type }}" data-parent="#homeAccordion">
        <div class="card-body">
            <form method="POST" action="{{ route('backend.sections.update') }}" class="form-row" enctype='multipart/form-data'>
                @csrf
                @method("patch")
                <input type="hidden" name="type" value="{{ $contactUsSection->type }}">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $contactUsSection->name }}">
                </div><!-- name -->
                <div class="form-group col-md-12 h-100">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $contactUsSection->description }}</textarea>
                </div><!-- description -->
                <div class="form-group col-md-12">
                    <label for="address">address</label>
                    <input type="text" name="data['address']" id="address" class="form-control" placeholder="address" value="{{ @$contactUsSection->data['address'] }}">
                </div><!-- address -->
                <div class="form-group col-md-12">
                    <label for="work_time">work_time</label>
                    <input type="text" name="data['work_time']" id="work_time" class="form-control" placeholder="work_time" value="{{ @$contactUsSection->data['work_time'] }}">
                </div><!-- work_time -->
                @foreach (['phone_1', 'phone_2'] as $item)
                    <div class="form-group col-md-12">
                        <label for="{{ $item }}">{{ $item }}</label>
                        <input type="text" name="data['{{ $item }}']" id="{{ $item }}" class="form-control" placeholder="{{ $item }}" value="{{ @$contactUsSection->data[$item] }}">
                    </div>
                @endforeach
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
