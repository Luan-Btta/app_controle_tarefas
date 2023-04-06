@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adicionar Tarefa</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tarefa.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="tarefa" class="form-label">Tarefa</label>
                                <input type="text" minlength="3" maxlength="200" class="form-control" id="tarefa" name="tarefa" required>
                            </div>
                            <div class="mb-3">
                                <label for="data_conclusao" class="form-label">Data Limite P/ Conclusão</label>
                                <input type="date" class="form-control" id="data_conclusao" name="data_conclusao" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Inserir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
