<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário Final</title>
</head>
<body>
    <h1>Cadastro de Usuário Final</h1>

    <form action="{{ route('usuario_final.store') }}" method="POST">
        @csrf

        <label for="nome_completo">Nome Completo:</label><br>
        <input type="text" id="nome_completo" name="nome_completo" required><br><br>

        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select><br><br>

        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

