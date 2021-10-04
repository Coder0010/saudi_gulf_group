@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">create portfolio</div>
                    <div class="card-body p-0">
                        @include('backend.portfolios.form',[
                            'route'  => route('portfolios.store'),
                            'entity' => old()
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
