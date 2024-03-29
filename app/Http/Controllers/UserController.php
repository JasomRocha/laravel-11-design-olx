<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(CreateUserRequest $request): JsonResponse
    {
        //Register User in Database

        $data = $request->only(['name', 'email', 'password', 'state_id']); //recebe apenas os campos definidos no only da requisição    
        $data['password'] = Hash::make($data['password']); //cria um hash da senha do usuario antes de passar para o banco de dados
        $user = User::create($data); //cria um usuário no banco de dados

        $response = [
            'error' => '',
            'token' => $user->createToken('RegisterToken')->plainTextToken
        ];
        return response()->json($response);  //retorna o token e o usuario após a criação no banco de dados
    }

    public function signin(SignInRequest $request): JsonResponse{
        $data = $request->only(['email', 'password']); //recebe apenas os campos definidos no only da requisição    
       //verifico se consegui fazer login ou não
        if (Auth::attempt($data)){
           $user = Auth::user();
           $response = [
                'error' => '',
                'token' => $user->createToken('Login_token')->plainTextToken
           ]; 
           return response()->json($response);
       }
        return response()->json(['error' => 'usuário ou senhas inválidos']);
    }

    public function me(Request $r): JsonResponse{
        $user = Auth::user();
        $response = [
            'name' => $user->name,
            'email' => $user->email,
            'state' =>$user->state->name,
            'ads' => $user->advertises
        ];
        
        return response()->json($response);
    }
}
