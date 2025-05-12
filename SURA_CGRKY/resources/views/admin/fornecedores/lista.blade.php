<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

    <h2>Fornecedores Pendentes</h2>

    @foreach ($pendentes as $fornecedor)
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Empresa:</strong> {{ $fornecedor->nome_empresa }}</p>
                <p><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
                <p><strong>Email:</strong> {{ $fornecedor->email }}</p>
                <p><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>

                <form action="{{ route('fornecedor.aprovar', $fornecedor->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-success">Aprovar</button>
                </form>

                <form action="{{ route('fornecedor.rejeitar', $fornecedor->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger">Rejeitar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>