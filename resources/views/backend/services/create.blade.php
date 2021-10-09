@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">create service</div>
                    <div class="card-body p-0">
                        @include('backend.services.form',[
                            'route' => route('backend.services.store'),
                            'entity'  => old()
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
