@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">edit {{ $entity->name }} package</div>
                    <div class="card-body p-0">
                        @include('backend.packages.form',[
                            'route'       => route('backend.packages.update', $entity),
                            'requestType' => 'patch',
                            'entity'      => $entity,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
