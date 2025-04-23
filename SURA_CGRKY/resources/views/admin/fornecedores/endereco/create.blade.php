<!-- resources/views/admin/fornecedores/endereco/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Endereço do Fornecedor</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px #ccc;
        }
        input, button {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            background: black;
            color: white;
            font-weight: bold;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Endereço para {{ $fornecedor->nome_empresa }}</h2>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('fornecedor.endereco.store', $fornecedor->id) }}" method="POST">
            @csrf
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="estado" placeholder="Estado" required>
            <input type="text" name="bairro" placeholder="Bairro" required>
            <input type="text" name="rua" placeholder="Rua" required>
            <input type="text" name="cep" placeholder="CEP" required>
            <button type="submit">Salvar Endereço</button>
        </form>
    </div>
</body>
</html>
