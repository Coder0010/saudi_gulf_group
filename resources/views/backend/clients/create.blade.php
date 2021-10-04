@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">create client</div>
                    <div class="card-body p-0">
                        @include('backend.clients.form',[
                            'route' => route('clients.store'),
                            'entity'  => old()
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
