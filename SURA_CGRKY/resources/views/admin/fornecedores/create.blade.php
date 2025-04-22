<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário Final</title>
</head>
<body>
    <h1>Cadastro de Usuário Final</h1>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuario_final.store') }}" method="POST">
        @csrf

        <label for="nome_completo">Nome Completo:</label><br>
        <input type="text" id="nome_completo" name="nome_completo" value="{{ old('nome_completo') }}" required maxlength="255" minlength="3"><br><br>

        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione</option>
            <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="feminino" {{ old('sexo') == 'feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="outro" {{ old('sexo') == 'outro' ? 'selected' : '' }}>Outro</option>
        </select><br><br>

        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="255"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" value="{{ old('senha') }}" required minlength="6"><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" required maxlength="15"><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required minlength="11" maxlength="11"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
