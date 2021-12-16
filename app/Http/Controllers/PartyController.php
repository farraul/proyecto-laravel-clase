<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Party;

class PartyController extends Controller

{
    //
    public function nuevaparty (Request $request){

        
        $nombre = $request->input('nombre');
        $idusuario = $request->input('idusuario');
        $idjuego = $request->input('idjuego');
        

        try {

            return Party::create(
                [
                    'nombre' => $nombre,
                    'idusuario' => $idusuario,
                    'idjuego' => $idjuego,
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
    public function showpartyByID($id){


    try {
        $Party = Party::all()
        ->where('id', "=", $id);
        return $Party;

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
        }
    }
    
}
    public function showAllparty(){
    
    try {
        
    return Party::all();

    } catch(QueryException $error) {
        return $error;
    }
}

public function Deleteparty($id){

    try {
        $arrayParty = Party::all()
        ->where('id', '=', $id);

        $Party = Party::where('id', '=', $id);
        
        if (count($arrayParty) == 0) {
            return response()->json([
                "data" => $arrayParty,
                "message" => "No se ha encontrado el Party"
            ]);
        }else{
            $Party->delete();
            return response()->json([
                "data" => $arrayParty,
                "message" => "Party borrado correctamente"
            ]);
        }

    } catch (QueryException $error) {

        $codigoError = $error->errorInfo[1];
        if($codigoError){
            return "Error $codigoError";
            }

        }
    }
    public function Updateteparty (Request $request,$id){

           
            
        $nombre = $request->input('nombre');
        $idusuario = $request->input('idusuario');
        $idjuego = $request->input('idjuego');
       


        try {
         
            $Party = Party::where('id', '=', $id)
            ->update(
                [
                    'nombre' => $nombre,
                    'idusuario' => $idusuario,
                    'idjuego' => $idjuego,
                   
                ]
                );
                return Party::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
         
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }
}