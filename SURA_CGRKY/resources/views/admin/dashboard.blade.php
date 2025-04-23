<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>Bem-vindo, {{ $admin->nome_usuario }}</h1>
  </header>

  <!-- Main Content -->
  <main>
    <a href="{{ route('fornecedores.create') }}">Cadastro de Fornecedor</a>
    <a href="{{ route('admin.logout') }}">Sair</a>
  </main>

  <!-- Footer -->
  <footer>
    &copy; 2025
  </footer>
</body>
</html>
