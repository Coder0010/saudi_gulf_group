@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">edit {{ $entity->name }} service</div>
                    <div class="card-body p-0">
                        @include('backend.services.form',[
                            'route'       => route('backend.services.update', $entity),
                            'requestType' => 'patch',
                            'entity'      => $entity,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#clients").val(@json($entity->clients()->pluck('id'))).trigger('change')
        $("#portfolios").val(@json($entity->portfolios()->pluck('id'))).trigger('change')
    </script>
@endsection
