<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Esqueci a Senha - Fornecedor</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 flex items-center justify-center h-screen text-white">
  <div class="bg-black p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-center text-2xl mb-4">Recuperação de Senha</h2>

    @if(session('success'))
      <div class="bg-green-500 p-3 rounded mb-4">{{ session('success') }}</div>
    @elseif($errors->any())
      <div class="bg-red-500 p-3 rounded mb-4">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('fornecedor.password.enviarCodigo') }}">
      @csrf
      <input type="email" name="email" required placeholder="Digite seu e-mail"
             class="h-10 px-4 rounded-md border border-gray-700 bg-gray-800 w-full text-sm">
      <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded mt-4">Enviar Código</button>
    </form>
  </div>
</body>
</html>
