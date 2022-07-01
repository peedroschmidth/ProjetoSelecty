<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

//Rotas para CandidatoController
Route::get('/',[CandidatoController::class,'index']); //Controller que irá listar as informações, tão como o botão para incluir novos.
Route::get('/candidatos/apagar/{id}', [CandidatoController::class, 'destroy']); //Controller que será utilizada para excluir algum candidato.
Route::get('/candidatos/editar/{id}', [CandidatoController::class, 'edit']); //Controller que será utilizada para editar algum candidato.
Route::post('/candidatos/{id}', [CandidatoController::class, 'update']); //Controller que será utilizada para salvar as alterações da edição de algum uscandidatouário.
Route::get('/candidatos/novo', [CandidatoController::class, 'create']); //Controller que será utilizada para incluir um novo candidato.
Route::post('/candidatos', [CandidatoController::class, 'store']); //Controller que será utilizada para salvar as informações do candidato.

