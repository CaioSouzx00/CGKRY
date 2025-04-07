<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login de Usuário Final</h1>

    @if(session('erro'))
        <p style="color: red;">{{ session('erro') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>


</body>
</html>
