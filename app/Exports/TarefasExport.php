<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Auth;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all();
        return Auth::user()->tarefas()->get();
    }

    public function headings() :array
    {
        return [
            'ID Tarefa',
            'Tarefa',
            'Data Limte Conclusão',
        ];
    }

    public function map($registro) :array
    {
        return [
            $registro->id,
            $registro->tarefa,
            date( 'd-m-Y', strtotime($registro->data_conclusao)),
        ];
    }
}
