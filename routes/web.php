<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware(['verified']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);

Route::get('/mensagem-teste', function(){
    return new MensagemTesteMail();
    //Mail::to('luanbds12@hotmail.com')->send(new MensagemTesteMail());
    //return 'Email enviado com sucesso!';
});
