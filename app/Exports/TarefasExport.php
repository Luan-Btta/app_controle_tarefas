<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
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
            'ID Usuário',
            'Tarefa',
            'Data Limte Conclusão',
            'Data Inclusão',
            'Data Atualização',
        ];
    }
}
