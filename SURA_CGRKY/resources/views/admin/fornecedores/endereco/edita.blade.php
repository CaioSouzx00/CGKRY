<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Endereço</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
            padding: 2rem;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input, button {
            width: 100%;
            padding: 0.75rem;
            margin-top: 1rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Endereço de {{ $fornecedor->nome_empresa }}</h2>
        <form action="{{ route('fornecedor.endereco.update', ['id' => $fornecedor->id, 'endereco_id' => $endereco->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="cidade" placeholder="Cidade" value="{{ $endereco->cidade }}" required>
            <input type="text" name="cep" placeholder="CEP" value="{{ $endereco->cep }}" required>
            <input type="text" name="bairro" placeholder="Bairro" value="{{ $endereco->bairro }}" required>
            <input type="text" name="estado" placeholder="Estado" value="{{ $endereco->estado }}" required>
            <input type="text" name="rua" placeholder="Rua" value="{{ $endereco->rua }}" required>

            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
