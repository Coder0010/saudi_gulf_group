@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-content-center justify-content-between">
                        <span>portfolios</span>
                        <a href="{{ route('portfolios.create') }}">create</a>
                    </div>
                    <div class="card-body p-0">
                        @include('backend.portfolios.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
