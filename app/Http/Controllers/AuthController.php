<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Autenticacao;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            []
        );

        // Logando e gerando token
        $email = $request->input('email');
        $password = $request->input('password');

        $tentativa = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if (!$tentativa) {
            return response()->json([
                'error' => 'Não Autorizado'
            ], 401);
        }

        // Autenticar
        $user = auth()->user();

        // Gerar token
        $token = $user->createToken($user->name)->plainTextToken;

        // Retornando token

        return response()->json(['token' => $token,  'user' => $user]);
    }

    public function logout(Request $request)
    {
        // Cancelando os tokens
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Saindo com sucesso'
        ]);
    }


    public function autenticando(Request $request)
    {
        // Validade infos

        // debug
        // dd($request);
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'tokenFunc' => 'required',
                // 'codigoToken' => 'unique:autenticacao,token_funcionario'
            ],
            [
                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.exists' => 'O campo de e-mail não é válido',
                'tokenFunc.required' => 'O campo de token é obrigatório.',
                // 'tokenFunc.exists' => 'O token informado não é válido',
            ]
        );
// 
        // dd($request->tokenFunc);


        // Logando usuário / Func  
        $email = $request->input('email');
        $password = $request->input('tokenFunc');

        $tentativa = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if ($tentativa) {
            return redirect()->route('direciona_form');
        }else{
            return redirect()->back()->withInput()->with('invalid_login', 'Erro ao autenticar!');
        }

        
    }

    public function direciona()
    {
        
        return view('formulario');
    }
}
