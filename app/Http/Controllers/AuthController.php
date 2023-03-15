<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{

    public function register(RegistroRequest $request){
        // validar registro
        $data = $request->validated();

    }
    public function login(RegistroRequest $request){

    }
    public function logout(RegistroRequest $request){

    }
}
