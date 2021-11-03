@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">create package</div>
                    <div class="card-body p-0">
                        @include('backend.packages.form',[
                            'route' => route('backend.packages.store'),
                            'entity'  => old()
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
