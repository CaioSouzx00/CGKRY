<?php

namespace App\Http\Controllers;

use App\Models\EnderecoUsuarioFinal;
use App\Models\UsuarioFinal;
use Illuminate\Http\Request;

class EnderecoUsuarioFinalController extends Controller
{
    public function create($id)
    {
        $usuario = UsuarioFinal::findOrFail($id);
        return view('usuario_final.endereco.create', compact('usuario'));
    }

    // Processar o formulário de cadastro de endereço
    public function store(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'cidade' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
        ]);

        // Criação do novo endereço
        $endereco = new EnderecoUsuarioFinal($validated);
        $endereco->id_usuario = $id; // Associa o endereço ao usuário
        $endereco->save();

        // Redireciona com sucesso
        return redirect('/dashboard')->with('success', 'Endereço salvo com sucesso!');

    }
}

