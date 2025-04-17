<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURA - Administração</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex flex-col items-center justify-center">

    <div class="bg-gray-900 p-8 rounded-2xl shadow-xl w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Painel da Administração</h1>

        <div class="flex flex-col gap-4">
            <a href="{{ route('usuario_final.create') }}"
               class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-gray-200 transition">
                Cadastrar Usuário Final
            </a>

            <a href="{{ route('login.form') }}"
               class="bg-gray-200 text-black font-semibold py-2 px-4 rounded hover:bg-gray-300 transition">
                Entrar como Usuário
            </a>

            <a href="{{ route('admin.login.form') }}"
               class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-gray-200 transition">
                Entrar como Administrador
            </a>
            <a href="{{ route('fornecedor.login') }}"
               class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-gray-200 transition">
                Entrar como Fornecedor
            </a>
    
        </div>
    </div>

    <footer class="mt-10 text-sm text-gray-500">
        &copy; 2025 SURA - Sistema Unificado de Registro e Administração
    </footer>

</body>
</html>
