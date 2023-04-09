<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public  function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $tarefas = Tarefa::where('user_id', Auth::user()->id)->paginate(10);

        return view('tarefa.index', compact('tarefas'));

        /*if(Auth::check()){
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $email = Auth::user()->email;

            return "ID: $id | Nome: $name | Email: $email";

        }else{
            return "Você não está logado";
        }

        if(auth()->check()){
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $email = auth()->user()->email;

            return "ID: $id | Nome: $name | Email: $email";

        }else{
            return "Você não está logado";
        }*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = Auth::user()->id;
        
        $tarefa = Tarefa::create($dados);
        
        Mail::to(Auth::user()->email)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        if ($tarefa->user_id != Auth::user()->id){
            return view('acesso-negado');
        }

;        return view('tarefa.create', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update($request->all());
        return $this->edit($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id != Auth::user()->id){
            return view('acesso-negado');
        }

        $tarefa->delete();
        return redirect()->route('tarefa.index');
    }

    public function exportacao($extensao)
    {
        $extensoes = ['csv', 'xlsx', 'pdf'];
        if(in_array($extensao, $extensoes)){
            return Excel::download(new TarefasExport, "MinhasTarefas.$extensao");
        }
            return redirect()->route('tarefa.index');
    }

    public function exportar()
    {
        $tarefas = Auth::user()->tarefas()->get();
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => $tarefas]);

        //papel e orientação: landscape(paisagem) ou portrait(retrato)
        $pdf->setPaper('a5', 'landscape');

        //return $pdf->download('minhas_tarefas.pdf');
        return $pdf->stream('minhas_tarefas.pdf');
    }
}
