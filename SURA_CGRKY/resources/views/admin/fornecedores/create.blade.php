<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hydrax - Cadastro Fornecedor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="h-screen overflow-hidden m-0 p-0 text-white font-sans bg-gradient-to-br from-[#1b1444] via-[#3b0f70] to-[#1c1a6e]">
  <!-- Partículas -->
  <div class="particle particle1"></div>
  <div class="particle particle2"></div>
  <div class="particle particle3"></div>
  <div class="particle particle4"></div>
  <div class="particle particle5"></div>

  <!-- Linhas -->
  <div class="line line1"></div>
  <div class="line line2"></div>
  <div class="line line3"></div>

  <!-- Botão voltar -->
  <a href="{{ route('fornecedor.login') }}" class="fixed top-4 left-4 z-50 w-9 h-9 flex items-center justify-center rounded-full bg-indigo-600 hover:bg-purple-700 transition-colors duration-300 shadow-[0_4px_20px_rgba(102,51,153,0.5)]"
     title="Voltar para o login">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </a>

  <!-- Container Principal -->
  <div class="flex items-center justify-center w-full h-full">
    <main class="flex w-full max-w-7xl h-[90%] bg-black/30 rounded-md border border-purple-800 p-8 relative backdrop-blur-md shadow-[0_4px_20px_rgba(128,0,128,0.4)]">
      
      <!-- Formulário de Cadastro -->
      <div class="w-full max-w-md mx-auto p-8 bg-black/60 rounded-lg shadow-lg">
        <h2 class="text-2xl font-[Orbitron] font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-200 text-center mb-8">
          Cadastro de Fornecedor
        </h2>

        <!-- Mensagem de sucesso -->
@if (session('success'))
  <div class="text-center bg-green-500/50 text-white p-4 mb-6 rounded border-2 border-green-500">
    {{ session('success') }}
  </div>
@endif

<!-- Mensagem de erro -->
@if (session('error'))
  <div class="text-center bg-red-500/50 text-white p-4 mb-6 rounded border-2 border-red-500">
    {{ session('error') }}
  </div>
@endif


        <form method="POST" action="{{ route('fornecedor.create.post') }}" class="space-y-4 mt-6">
  @csrf

  <!-- Nome da Empresa -->
  <div class="flex items-center space-x-3">
    <input type="text" name="nome_empresa" placeholder="Nome da Empresa" 
           required maxlength="50"
           class="h-11 px-4 rounded-md border border-indigo-400 bg-gray-900/60 text-white text-sm w-full">
  </div>

  <!-- E-mail -->
  <div class="flex items-center space-x-3">
    <input type="email" name="email" placeholder="E-mail" 
           required maxlength="60"
           class="h-11 px-4 rounded-md border border-indigo-400 bg-gray-900/60 text-white text-sm w-full">
  </div>

  <!-- Telefone -->
  <div class="flex items-center space-x-3">
    <input type="text" name="telefone" placeholder="Telefone" 
           required minlength="8" maxlength="9"
           class="h-11 px-4 rounded-md border border-indigo-400 bg-gray-900/60 text-white text-sm w-full">
  </div>

  <!-- CNPJ -->
  <div class="flex items-center space-x-3">
    <input type="text" name="cnpj" placeholder="CNPJ" 
           required maxlength="14" minlength="14"
           class="h-11 px-4 rounded-md border border-indigo-400 bg-gray-900/60 text-white text-sm w-full">
  </div>

  <!-- Senha -->
  <div class="flex items-center space-x-3">
    <input type="password" name="senha" placeholder="Senha" 
           required minlength="6" maxlength="40"
           class="h-11 px-4 rounded-md border border-indigo-400 bg-gray-900/60 text-white text-sm w-full">
  </div>

  <!-- Botão de Cadastro -->
  <button type="submit"
          class="relative px-5 py-2 border-2 border-violet-600 text-violet-400 rounded-xl hover:text-white hover:bg-violet-700 transition-all duration-300 w-full">
    Cadastrar
  </button>
</form>


        <footer class="mt-16 text-center text-xs text-white/60 hover:text-indigo-300 transition duration-300">
          &copy; 2025 <strong>Hydrax</strong> - Todos os direitos reservados
        </footer>
      </div>
    </main>
  </div>

</body>
</html>
