<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{

    public function register(RegistroRequest $request){
        // validar registro
        $data = $request->validated();

        // Crear Usuario
        $user = User::create([
            'name' =>$data['name'],
            'email' =>$data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user'  => $user
        ];

    }
    public function login(LoginRequest $request){
        $data = $request->validated();

        // verificar password
        if(!Auth::attempt($data)){
            return response([
                'errors' =>['El Correo o Contraseña no son validos']
            ], 422);
        }
        // autenticar usuario
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user'  => $user
        ];
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return[
            'user' => null
        ];
    }
}
