<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::select(
            'id',
            'tipo_pessoa',
            'perfil',
            'email',
            'telefone',
            'nome',
            'cpf',
            'razao_social',
            'nome_fantasia',
            'cnpj',
            'identificador_estrangeiro',
            'documento_comprobatorio'
        )
        ->orderBy('id')
        ->get();

        return response()->json($empresas);
    }


    public function store(Request $request)
    {
        try {
            // Validação de dados
            $validator = Validator::make($request->all(), [
                'tipo_pessoa' => 'required|in:juridica,fisica,estrangeira',
                'razao_social' => 'required_if:tipo_pessoa,juridica,estrangeira|max:255',
                'nome_fantasia' => 'required_if:tipo_pessoa,juridica,estrangeira|max:255',
                'cnpj' => 'required_if:tipo_pessoa,juridica|size:14',
                'nome' => 'required_if:tipo_pessoa,fisica|max:255',
                'cpf' => 'required_if:tipo_pessoa,fisica|size:11',
                'email' => 'required|email|max:255',
                'telefone' => 'required|max:50',
                'perfil' => 'required|string|max:100',
                'documento_comprobatorio' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
                'pass' => 'nullable|string|min:4',
            ]);

            // Se houver erros na validação, retorna erro
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Upload do arquivo
            $path = $request->file('documento_comprobatorio')->store('documentos', 'public');

            // cadastro
            $empresa = new Empresa();
            $empresa->tipo_pessoa = $request->tipo_pessoa;
            $empresa->razao_social = $request->razao_social ?? null;
            $empresa->nome_fantasia = $request->nome_fantasia ?? null;
            $empresa->cnpj = $request->cnpj ?? null;
            $empresa->nome = $request->nome ?? null;
            $empresa->cpf = $request->cpf ?? null;
            $empresa->email = $request->email;
            $empresa->telefone = $request->telefone;
            $empresa->perfil = $request->perfil;
            $empresa->faturamento_direto = (bool) $request->input('faturamento_direto');
            $empresa->identificador_estrangeiro = $request->identificador_estrangeiro;
            $empresa->documento_comprobatorio = $path;

            $senhaPadrao = $request->pass ?? '1234';
            $empresa->pass = Hash::make($senhaPadrao); // SALVA COM HASH
            $empresa->save();

            return response()->json(['message' => 'Empresa cadastrada com sucesso'], 201);

        } catch (\Exception $e) {
            // Retorna mensagem de erro
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function urlImagem($caminho) {
        return `http://localhost:8000/storage/${caminho}`;
    }

}
