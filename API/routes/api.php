<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\v1\UsuariosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/v1/usuarios',[UsuariosController::class,'getAll']); //recupera todo
Route::get('/v1/usuarios/{id}', [UsuariosController::class,'getItem']); //recupera todogetItem']);//recupera solo un producto
Route::post('/v1/usuarios', [UsuariosController::class,'store']); //recupera todostore']);

Route::put('/v1/usuarios', [UsuariosController::class,'puUpdater']); //recupera todoputUpdate']);

Route::patch('/v1/usuarios', [UsuariosController::class,'patchUpdate']); //recupera todopatchUpdate']);
Route::delete('/v1/usuarios/{id}', [UsuariosController::class,'delete']); //recupera tododelete']);