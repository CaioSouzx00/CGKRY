<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURA - Login</title>
</head>
<body>
    
    <h1>Pagina da Administração</h1>


    <a href="{{ route('usuario_final.create') }}" style="padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">Cadastrar Usuário Final</a><br><br>
    <a href="{{ route('login.form') }}" style="padding: 10px; background-color: red; color: black; text-decoration: none; border-radius: 5px;">Entra com Usuário</a><br><br><br><br>
    <a href="{{ route('admin.login.form') }}" style="padding: 10px; background-color: green; color: white; text-decoration: none; border-radius: 5px;">Entrar como Administrador</a>


</body>
</html>


