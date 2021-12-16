<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\User;
class UserController extends Controller
{
    //
    public function showAllUsuario(){

        try {
            
        return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Usuarios////////////////
    public function addUsuarios(Request $request){//sin id y sin fecha

        $email = $request->input('email');
        $nombre = $request->input('nombre');
        $password = $request->input('password');
        $role = $request->input('role');
        $tipo = $request->input('tipo');
        $raza = $request->input('raza');
        $edad = $request->input('edad');
        $localidad = $request->input('localidad');

        try {

            return User::create(
                [
                    'email' => $email,
                    'nombre' => $nombre,
                    'role' => $role,
                    'password' => $password,
                    'tipo' => $tipo,
                    'raza' => $raza,
                    'edad' => $edad,
                    'localidad' => $localidad,
                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Usuarios////////////////
    public function UpdateUsuarios (Request $request,$id){

       
        $email = $request->input('email');
        $nombre = $request->input('nombre');
        $password = $request->input('password');
        $tipo = $request->input('tipo');
        $raza = $request->input('raza');
        $edad = $request->input('edad');
        $localidad = $request->input('localidad');


        try {

            $Usuario = User::where('id', '=', $id)
            ->update(
                [
                    'email' => $email,
                    'nombre' => $nombre,
                    'password' => $password,
                    'tipo' => $tipo,
                    'raza' => $raza,
                    'edad' => $edad,
                    'localidad' => $localidad,
                ]
                );
                return User::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Busqueda por ID Usuarios ////////////////

    public function UsuariosByID($id){


        try {
            $Usuario = User::all()
            ->where('id', "=", $id);
            return $Usuario;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Borrar Usuarios ////////////////
    public function DeleteUsuarios($id){

        

        try {
    ////////////////BUSCA EL PLAYER POR ID. SI EXISTE, BORRA EL PLAYER. SI NO, SACA MENSAJE DE ERROR////////////////
            $arrayUsuario = User::all()
            ->where('id', '=', $id);

            $Usuario = User::where('id', '=', $id);
            
            if (count($arrayUsuario) == 0) {
                return response()->json([
                    "data" => $arrayUsuario,
                    "message" => "No se ha encontrado el Usuario"
                ]);
            }else{
                $Usuario->delete();
                return response()->json([
                    "data" => $arrayUsuario,
                    "message" => "Usuario borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }
}
    
// public function showProfile(Request $request){

//     $id = $request->input('id');

//     try {

//         return Usuario::all()->where('id', '=', $id)
//         ->makeHidden(['password'])->keyBy('id');

//     } catch (QueryException $error) {
//         return $error;
//     }
// }

// public function registerUser(Request $request){

//     $validatedData = $request->validate([
//         'email' => 'required|email',
//         'nombre' => 'required|string',
//         'password' => 'required|min:8',
//         'tipo' => 'required',
//         'raza' => 'required',
//         'edad' => 'required',
//         'localidad' => 'required|string',
        
//     ], [
//         'name.required' => 'Name is required',
//         'password.required' => 'Password is required',
//         'email.required' => 'Email is required'
//     ]);