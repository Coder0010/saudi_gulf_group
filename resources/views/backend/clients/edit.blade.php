@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">edit {{ $entity->name }} client</div>
                    <div class="card-body p-0">
                        @include('backend.clients.form',[
                            'route'       => route('backend.clients.update', $entity),
                            'requestType' => 'patch',
                            'entity'      => $entity,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
