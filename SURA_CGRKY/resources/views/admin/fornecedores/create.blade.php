<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor</title>
</head>
<body>

    <h1>Cadastrar Fornecedor</h1>

    <!-- Mensagem de sucesso, se existir -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário de Cadastro -->
    <form action="{{ route('fornecedores.store') }}" method="POST">
        @csrf

        <!-- Nome da Empresa -->
        <label for="nome_empresa">Nome da Empresa:</label>
        <input type="text" id="nome_empresa" name="nome_empresa" required><br><br>

        <!-- CNPJ -->
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" required><br><br>

        <!-- Telefone -->
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <!-- E-mail -->
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <!-- Senha -->
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <!-- Botão para Submeter -->
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>
