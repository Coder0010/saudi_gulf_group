@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card-body p-0">
                        @include('backend.leads.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
