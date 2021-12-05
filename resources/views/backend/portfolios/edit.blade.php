@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">edit {{ $entity->name }} portfolio</div>
                    <div class="card-body p-0">
                        @include('backend.portfolios.form',[
                            'route'       => route('backend.portfolios.update', $entity),
                            'requestType' => 'patch',
                            'entity'      => $entity,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
