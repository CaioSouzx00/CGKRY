<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hydrax - Cadastro Fornecedor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="h-screen bg-gradient-to-br from-[#0f0c29] via-[#302b63] to-[#24243e] overflow-hidden">

  <!-- Botão voltar -->
  <a href="{{ route('fornecedor.login') }}" class="fixed top-6 left-6 z-50 w-10 h-10 flex items-center justify-center rounded-full bg-indigo-600 hover:bg-purple-700 transition duration-300 shadow-xl">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </a>

  <!-- Container Principal -->
  <div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-4xl bg-white/5 backdrop-blur-lg shadow-[0_10px_40px_rgba(0,0,0,0.6)] rounded-2xl border border-purple-700 p-10">
      <h2 class="text-3xl font-[Orbitron] font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-200 mb-8">
        Cadastro de Fornecedor
      </h2>

      <!-- Mensagens -->
      @if (session('success'))
      <div class="bg-green-500/20 border border-green-500 text-green-200 text-center p-3 rounded mb-6">
        {{ session('success') }}
      </div>
      @endif

      @if (session('error'))
      <div class="bg-red-500/20 border border-red-500 text-red-200 text-center p-3 rounded mb-6">
        {{ session('error') }}
      </div>
      @endif

      <!-- Formulário -->
      <form method="POST" action="{{ route('fornecedor.create.post') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <input type="text" name="nome_empresa" placeholder="Nome da Empresa" required maxlength="50"
               class="px-4 py-3 rounded-lg bg-gray-900/80 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <input type="email" name="email" placeholder="E-mail" required maxlength="60"
               class="px-4 py-3 rounded-lg bg-gray-900/80 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <input type="text" name="telefone" placeholder="Telefone" required minlength="8" maxlength="9"
               class="px-4 py-3 rounded-lg bg-gray-900/80 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <input type="text" name="cnpj" placeholder="CNPJ" required minlength="14" maxlength="14"
               class="px-4 py-3 rounded-lg bg-gray-900/80 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <input type="password" name="senha" placeholder="Senha" required minlength="6" maxlength="40"
               class="px-4 py-3 rounded-lg bg-gray-900/80 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <div class="md:col-span-2">
          <button type="submit"
                  class="w-full py-3 mt-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold rounded-xl transition duration-300 shadow-lg">
            Cadastrar
          </button>
        </div>
      </form>

      <p class="text-xs text-center text-gray-300 mt-6">
        Assim que confirmar o cadastro, aguarde. Enviaremos um e-mail com a aprovação da sua conta para venda de produtos no nosso sistema.
      </p>

      <footer class="mt-10 text-center text-xs text-white/40 hover:text-indigo-300 transition">
        &copy; 2025 <strong>Hydrax</strong> - Todos os direitos reservados
      </footer>
    </div>
  </div>

</body>
</html>
