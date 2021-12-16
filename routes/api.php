<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/usuario', function (Request $request) {
//     return $request->usuario();
// });
//Registro
Route::post('newUser', [AuthController::class, "userRegister"]);
//login
Route::post('loginUser', [AuthController::class, "userLogin"]);
//midelware
Route::middleware('auth:api')->group(function(){
//USUARIOS
Route::get('Usuario', [UserController::class, "showAllUsuario"]);//
Route::post('Usuario', [UserController::class, "addUsuarios"]);//
Route::get('Usuario/{id}', [UserController::class, "UsuariosByID"]);//
Route::put('Usuario/{id}', [UserController::class, "UpdateUsuarios"]);//
Route::delete('Usuario/{id}', [UserController::class, "DeleteUsuarios"]);//
//PARTYS --getall,byid del usuario,delete
Route::post('Party', [PartyController::class, "nuevaparty"]);//funciona pero sin las relaciones
Route::get('Party', [PartyController::class, "showAllparty"]);//
Route::get('party/{id}', [PartyController::class, "showpartyByID"]);//
Route::delete('Party/{id}', [PartyController::class, "Deleteparty"]);//
Route::put('Party/{id}', [PartyController::class, "Updateteparty"]);//
//JUEGO--todos
Route::post('Juego', [JuegoController::class, "createJuego"]);//
Route::get('Juego', [JuegoController::class, "showAllJuego"]);//
Route::get('Juego/{id}', [JuegoController::class, "showJuegoByID"]);//
Route::put('Juego/{id}', [JuegoController::class, "updateJuego"]);//
Route::delete('Juego/{id}', [JuegoController::class, "deleteJuego"]);//
//MENSAJES--delete--getbyid buscar por id party
Route::post('Mensaje', [MensajeController::class, "createMensaje"]);//
Route::delete('Mensaje/{id}', [MensajeController::class, "deleteMensaje"]);//
Route::get('Mensaje/{id}', [MensajeController::class, "MensajebyID"]);//
Route::get('Mensaje', [MensajeController::class, "showAllMensaje"]);//
});