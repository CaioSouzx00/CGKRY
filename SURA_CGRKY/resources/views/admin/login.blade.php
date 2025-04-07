<!-- resources/views/admin/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login de Administrador</h2>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <label>Nome de Usuário:</label>
        <input type="text" name="nome_usuario" value="{{ old('nome_usuario') }}"><br><br>

        <label>Senha:</label>
        <input type="password" name="senha"><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>

