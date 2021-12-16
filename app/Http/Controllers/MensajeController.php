<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    //crear los mensajes
    public function createMensaje (Request $request){

        $idusuario = $request->input('idusuario');
        $idparty = $request->input('idparty');
        $mensaje = $request->input('mensaje');
        
        

        try {

            return Mensaje::create(
                [
                    'idusuario' => $idusuario,
                    'idparty' => $idparty,
                    'mensaje'=>$mensaje,

                ]
            );

        } catch (QueryException $error) {
            echo"error";
            $codigoError = $error->errorInfo[1];

            if($codigoError){
                return "Error $codigoError";
            }
           
        }
    }
    //ver los mensajes por la id
    public function MensajebyID($id){


        try {
            $Mensaje = Mensaje::all()
            ->where('id', "=", $id);
            return $Mensaje;
    
        } catch (QueryException $error) {
    
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }
    public function deleteMensaje($id){

        try {
            $arrayMensaje = Mensaje::all()
            ->where('id', '=', $id);

            $Mensaje = Mensaje::where('id', '=', $id);
            
            if (count($arrayMensaje) == 0) {
                return response()->json([
                    "data" => $arrayMensaje,
                    "message" => "No se ha encontrado el Mensaje"
                ]);
            }else{
                $Mensaje->delete();
                return response()->json([
                    "data" => $arrayMensaje,
                    "message" => "Mensaje borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            }
        }
        public function showAllMensaje(){
    
            try {
                
            return Mensaje::all();
    
            } catch(QueryException $error) {
                return $error;
            }
        }
    }