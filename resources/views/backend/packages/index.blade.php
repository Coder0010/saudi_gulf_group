@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-content-center justify-content-between">
                        <span>packages</span>
                        <a href="{{ route('backend.packages.create') }}">create</a>
                    </div>
                    <div class="card-body p-0">
                        @include('backend.packages.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
