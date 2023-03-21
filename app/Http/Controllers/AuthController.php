<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
    public function login(RegistroRequest $request){

    }
    public function logout(RegistroRequest $request){

    }
}
