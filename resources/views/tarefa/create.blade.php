@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($tarefa) ? 'Editar Tarefa' : 'Adicionar Tarefa' }}</div>

                    <div class="card-body">

                        @if (isset($tarefa))
                            <form method="POST" action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" action="{{ route('tarefa.store') }}">
                        @endif

                        @csrf
                        <div class="mb-3">
                            <label for="tarefa" class="form-label">Tarefa</label>
                            <input type="text" minlength="3" maxlength="200" class="form-control" id="tarefa"
                                name="tarefa" value="{{ isset($tarefa->tarefa) ? $tarefa->tarefa : old('tarefa') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="data_conclusao" class="form-label">Data Limite P/ Conclusão</label>
                            <input type="date" class="form-control" id="data_conclusao" name="data_conclusao"
                                value="{{ isset($tarefa->data_conclusao) ? $tarefa->data_conclusao : old('data_conclusao') }}"
                                required>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ isset($tarefa) ? 'Atualizar' : 'Inserir' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
