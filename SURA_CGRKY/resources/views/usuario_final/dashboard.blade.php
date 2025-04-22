{{-- resources/views/usuario_final/dashboard.blade.php --}}

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
            background-color: #f5f5f5;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 10px #ccc;
            max-width: 500px;
        }
    </style>
</head>
<body>

@if ($isFornecedor)
    <h2>Painel do Fornecedor</h2>
    <div class="card">
        <p><strong>Empresa:</strong> {{ $usuario->nome_empresa }}</p>
        <p><strong>CNPJ:</strong> {{ $usuario->cnpj }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>

        <!-- Link para página de endereço -->
        <a href="{{ route('fornecedor.endereco.create', ['id' => $usuario->id]) }}">Cadastrar/Editar Endereço</a>
    </div>
    @else
        <h2>Painel do Usuário</h2>
        <div class="card">
            <p><strong>Nome:</strong> {{ $usuario->nome_completo }}</p>
            <p><strong>CPF:</strong> {{ $usuario->cpf }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>

            <!-- Link para página de endereço do usuário -->
            <a href="{{ route('endereco.create', ['id' => $usuario->id]) }}">Cadastrar</a>
            

        </div>
    @endif

</body>
</html>
