<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\User;

class AuthController extends Controller
{
    //REGISTRAR usuarios

    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required|min:4',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'tipo' => $request->tipo,
            'raza' => $request->raza,
            'edad' => $request->edad,
            'localidad' => $request->localidad
         
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    //LOGIN DE usuarios
   
    public function userLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
