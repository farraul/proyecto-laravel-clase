<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller

{
    //CREAR JUEGOS//
    public function createJuego (Request $request){

        $nombre = $request->input('nombre');
        $compania = $request->input('compania');
        $descripcion = $request->input('descripcion');
        

        try {

            return Juego::create(
                [
                    'nombre' => $nombre,
                    'compania' => $compania,
                    'descripcion' => $descripcion,
                   
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
    //BUSCAR JUEGOS POR ID//
    public function showJuegoByID($id){


        try {
            $Juego = Juego::all()
            ->where('id', "=", $id);
            return $Juego;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }
    
        //VER TODOS LOS JUEGOS//
        public function showAllJuego(){
    
            try {
                
            return Juego::all();
    
            } catch(QueryException $error) {
                return $error;
            }
        }

        //ACTUALIZAR JUEGOS//
        public function updateJuego (Request $request,$id){

           
            
            $nombre = $request->input('nombre');
            $compania = $request->input('compania');
            $descripcion = $request->input('descripcion');
           
    
    
            try {
             
                $Juego = Juego::where('id', '=', $id)
                ->update(
                    [
                        'nombre' => $nombre,
                        'compania' => $compania,
                        'descripcion' => $descripcion,
                       
                    ]
                    );
                    return Juego::all()
                    ->where('id', "=", $id);
    
            } catch (QueryException $error) {
             
                $codigoError = $error->errorInfo[1];
                if($codigoError){
                    return "Error $codigoError";
                }
    
                    
            }
            
        }

        
        //BORRAR JUEGOS//
        public function deleteJuego($id){

            try {
                $arrayJuego = Juego::all()
                ->where('id', '=', $id);
    
                $Juego = Juego::where('id', '=', $id);
                
                if (count($arrayJuego) == 0) {
                    return response()->json([
                        "data" => $arrayJuego,
                        "message" => "No se ha encontrado el Juego"
                    ]);
                }else{
                    $Juego->delete();
                    return response()->json([
                        "data" => $arrayJuego,
                        "message" => "Juego borrado correctamente"
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


