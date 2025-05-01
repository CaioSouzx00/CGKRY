<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redefinir Senha</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 flex items-center justify-center h-screen text-white">
  <div class="bg-black p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-center text-2xl mb-4">Redefinir Senha</h2>

    @if($errors->any())
      <div class="bg-red-500 text-white p-3 rounded mb-4">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form action="{{ route('password.redefinirSenha') }}" method="POST">
      @csrf
      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="token" value="{{ $token }}">

      <label for="password" class="block text-sm mb-2">Nova Senha</label>
      <input type="password" name="password" id="password" class="w-full p-2 bg-gray-700 rounded mb-4" required>

      <label for="password_confirmation" class="block text-sm mb-2">Confirmar Senha</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 bg-gray-700 rounded mb-4" required>

      <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded">Redefinir Senha</button>
    </form>
  </div>
</body>
</html>
