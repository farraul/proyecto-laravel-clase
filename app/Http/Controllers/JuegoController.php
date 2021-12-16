<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller

{
    //CREAR GameS//
    public function createGame (Request $request){

        $nombre = $request->input('nombre');
        $compania = $request->input('compania');
        $descripcion = $request->input('descripcion');
        

        try {

            return Game::create(
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
    //BUSCAR GameS POR ID//
    public function showGameByID($id){


        try {
            $Game = Game::all()
            ->where('id', "=", $id);
            return $Game;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }
    
        //VER TODOS LOS GameS//
        public function showAllGame(){
    
            try {
                
            return Game::all();
    
            } catch(QueryException $error) {
                return $error;
            }
        }

        //ACTUALIZAR GameS//
        public function updateGame (Request $request,$id){

           
            
            $nombre = $request->input('nombre');
            $compania = $request->input('compania');
            $descripcion = $request->input('descripcion');
           
    
    
            try {
             
                $Game = Game::where('id', '=', $id)
                ->update(
                    [
                        'nombre' => $nombre,
                        'compania' => $compania,
                        'descripcion' => $descripcion,
                       
                    ]
                    );
                    return Game::all()
                    ->where('id', "=", $id);
    
            } catch (QueryException $error) {
             
                $codigoError = $error->errorInfo[1];
                if($codigoError){
                    return "Error $codigoError";
                }
    
                    
            }
            
        }

        
        //BORRAR GameS//
        public function deleteGame($id){

            try {
                $arrayGame = Game::all()
                ->where('id', '=', $id);
    
                $Game = Game::where('id', '=', $id);
                
                if (count($arrayGame) == 0) {
                    return response()->json([
                        "data" => $arrayGame,
                        "message" => "No se ha encontrado el Game"
                    ]);
                }else{
                    $Game->delete();
                    return response()->json([
                        "data" => $arrayGame,
                        "message" => "Game borrado correctamente"
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


