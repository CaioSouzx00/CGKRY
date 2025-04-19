<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #fff;
            font-size: 24px;
        }
        .content {
            margin: 20px;
            text-align: center;
        }
        a {
            color: #fff;
            text-decoration: none;
            background-color: #444;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #555;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Bem-vindo, {{ $admin->nome_usuario }}</h1>
    </header>

    <div class="content">
        <a href="{{ route('fornecedores.create') }}">Cadastro de Fornecedor</a>
        <br>
        <a href="{{ route('admin.logout') }}">Sair</a>
    </div>

    <div class="footer">
        <p>&copy; 2025 Empresa XYZ</p>
    </div>

</body>
</html>
