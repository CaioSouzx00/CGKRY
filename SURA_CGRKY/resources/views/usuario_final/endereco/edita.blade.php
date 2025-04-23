<!-- resources/views/usuario_final/endereco/edita.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Endereço</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
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
        label {
            display: block;
            margin-top: 1rem;
        }
        input {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.25rem;
        }
        button {
            margin-top: 1.5rem;
            padding: 0.5rem 1rem;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Endereço</h2>

    <form action="{{ route('endereco.update', ['id' => $usuario->id, 'endereco_id' => $endereco->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade" value="{{ $endereco->cidade }}">

        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" value="{{ $endereco->cep }}">

        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro" value="{{ $endereco->bairro }}">

        <label for="estado">Estado</label>
        <input type="text" id="estado" name="estado" value="{{ $endereco->estado }}">

        <label for="rua">Rua</label>
        <input type="text" id="rua" name="rua" value="{{ $endereco->rua }}">

        <label for="numero">Número</label>
        <input type="text" id="numero" name="numero" value="{{ $endereco->numero }}">

        <button type="submit">Atualizar</button>
    </form>
</div>
</body>
</html>
