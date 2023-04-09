@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tarefas <a href="{{route('tarefa.create')}}" class="float-end">Novo</a></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data Limite Conclusão</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $tarefa)
                                    <tr>
                                        <th scope="row">{{ $tarefa->id }}</th>
                                        <td>{{ $tarefa->tarefa }}</td>
                                        <td>{{ date('d-m-Y', strtotime($tarefa->data_conclusao)) }}</td>
                                        <td>
                                            <a href="{{ route('tarefa.edit', $tarefa->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}" id="form_x{{ $tarefa->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" onclick="document.getElementById('form_x{{ $tarefa->id }}').submit()">
                                                <i class="fa-solid fa-calendar-xmark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
