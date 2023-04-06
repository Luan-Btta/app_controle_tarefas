@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $tarefa->tarefa }}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="data_conclusao" class="form-label">Data Limite P/ Conclusão</label>
                            <input type="date" class="form-control" id="data_conclusao" name="data_conclusao"
                                readonly value="{{ $tarefa->data_conclusao }}">
                        </div>
                        <div class="mb-3">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
