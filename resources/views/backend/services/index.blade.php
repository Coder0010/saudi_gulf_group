@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-content-center justify-content-between">
                        <span>services</span>
                        <a href="{{ route('backend.services.create') }}">create</a>
                    </div>
                    <div class="card-body p-0">
                        @include('backend.services.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
