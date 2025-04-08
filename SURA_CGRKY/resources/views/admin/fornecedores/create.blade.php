<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fornecedores</title>
</head>
<body>
    
<h1>Cadastrar Fornecedor</h1>

<form method="POST" action="{{ route('fornecedores.store') }}">
    @csrf

    <input type="text" name="nome_empresa" placeholder="Nome da Empresa"><br>
    <input type="text" name="cnpj" placeholder="CNPJ"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <input type="text" name="telefone" placeholder="Telefone"><br>
    <input type="email" name="email" placeholder="Email"><br><br><br>

    <input type="text" name="cidade" placeholder="Cidade"><br>
    <input type="text" name="cep" placeholder="CEP"><br>
    <input type="text" name="bairro" placeholder="Bairro"><br>
    <input type="text" name="estado" placeholder="Estado"><br>
    <input type="text" name="rua" placeholder="Rua"><br>

    <button type="submit">Cadastrar</button>
</form>


</body>
</html>