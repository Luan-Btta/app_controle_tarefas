@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-danger fw-bold">Acesso Negado</div>

                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            Essa tarefa não pertence a você
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
