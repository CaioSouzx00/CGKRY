<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Fornecedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center">

    <div class="bg-gray-900 p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Login do Fornecedor</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-6 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fornecedor.login.post') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label for="email" class="block">E-mail:</label>
                <input type="email" name="email" required class="w-full p-2 mt-2 bg-gray-800 text-white rounded" />
            </div>

            <div class="mb-4">
                <label for="senha" class="block">Senha:</label>
                <input type="password" name="senha" required class="w-full p-2 mt-2 bg-gray-800 text-white rounded" />
            </div>

            <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition w-full">
                Entrar
            </button>
        </form>
    </div>

</body>
</html>
