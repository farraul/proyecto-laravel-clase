<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;
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
//midelware solo para los internos y pide token
Route::middleware('auth:api')->group(function(){
//usuarios
Route::get('Usuario', [UserController::class, "showAllUsuario"]);
Route::post('Usuario', [UserController::class, "addUsuarios"]);
Route::get('Usuario/{id}', [UserController::class, "UsuariosByID"]);
Route::put('Usuario/{id}', [UserController::class, "UpdateUsuarios"]);
Route::delete('Usuario/{id}', [UserController::class, "DeleteUsuarios"]);
//Partys
Route::post('Party', [PartyController::class, "nuevaparty"]);
Route::get('Party', [PartyController::class, "showAllparty"]);//
Route::get('party/{id}', [PartyController::class, "showpartyByID"]);
Route::delete('Party/{id}', [PartyController::class, "Deleteparty"]);
Route::put('Party/{id}', [PartyController::class, "Updateteparty"]);
// Game
Route::post('Game', [GameController::class, "createGame"]);//
Route::get('Game', [GameController::class, "showAllGame"]);//
Route::get('Game/{id}', [GameController::class, "showGameByID"]);
Route::put('Game/{id}', [GameController::class, "updateGame"]);
Route::delete('Game/{id}', [GameController::class, "deleteGame"]);
//Mensajes
Route::post('Mensaje', [MensajeController::class, "createMensaje"]);
Route::delete('Mensaje/{id}', [MensajeController::class, "deleteMensaje"]);
Route::get('Mensaje/{id}', [MensajeController::class, "MensajebyID"]);
Route::get('Mensaje', [MensajeController::class, "showAllMensaje"]);
});