<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação básica
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Busca empresa por email
        $empresa = Empresa::where('email', $request->email)->first();

        if (! $empresa || ! Hash::check($request->password, $empresa->pass)) {
            return response()->json([
                'message' => 'Credenciais inválidas.'
            ], 401);
        }

        // Criar token de autenticação com Sanctum
        $token = $empresa->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'empresa' => $empresa
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }
}
