@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('backend.leads.table')
            </div>
        </div>
    </div>
@endsection
