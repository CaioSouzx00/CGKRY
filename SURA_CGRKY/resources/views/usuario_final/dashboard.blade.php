<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen relative">



  @php
      $nome = $usuario->nome_completo ?? $usuario->nome_empresa;
      $foto = $usuario->foto && file_exists(public_path('storage/' . $usuario->foto))
          ? asset('storage/' . $usuario->foto)
          : 'https://ui-avatars.com/api/?name=' . urlencode($nome) . '&background=7f5af0&color=fff';
  @endphp

<!-- Navbar -->
<header class="fixed top-0 left-0 w-full z-50 backdrop-blur-lg bg-black/60 border-b border-indigo-700/30 shadow-md">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <!-- Toggle (checkbox) -->
  <input type="checkbox" id="menu-toggle" class="hidden peer" />

<!-- Botão ☰ (aparece só quando menu fechado) -->
<label for="menu-toggle" class="fixed top-4 left-7 z-50 text-white text-xl p-3 rounded cursor-pointer peer-checked:hidden">
  ☰
</label>

<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-full w-64 bg-black/90 text-white z-50 transform -translate-x-full peer-checked:translate-x-0 transition-transform duration-500 ease-in-out shadow-[0_0_30px_rgba(0,0,0,0.6)] border-r border-indigo-800">

  <!-- Botão Fechar -->
  <label for="menu-toggle" class="absolute top-4 right-4 text-white text-2xl cursor-pointer hover:text-pink-400 transition duration-300 transform">
    ✕
  </label>

  <!-- Conteúdo -->
  <div class="mt-16 px-4 py-6 bg-black/90 text-white rounded-b-2xl shadow-2xl max-w-xs mx-auto border-r border-b border-indigo-800">

    <!-- Logo sem brilho -->
    <div class="flex justify-center mb-6">
      <img src="{{ $foto }}" alt="Perfil" class="w-32 h-32 object-cover rounded-full border-4 border-indigo-500 shadow-lg">
    </div>

    <!-- Linha de separação -->
    <hr class="border-indigo-600 opacity-30 mb-4">

<!-- Navegação -->
<nav class="space-y-2 text-sm font-medium">
  @if ($isFornecedor)
    @foreach (['Perfil', 'Produtos', 'sla', 'sla'] as $item)
      @if ($item === 'Perfil')
        <label for="perfil-toggle" class="group flex items-center gap-3 px-4 py-2 rounded-lg bg-gray-800/40 hover:bg-indigo-600 transition duration-300 hover:scale-[1.02] shadow-md hover:shadow-xl cursor-pointer">
          <span class="group-hover:tracking-wide transition-all duration-300">{{ $item }}</span>
          <svg class="w-4 h-4 text-indigo-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </label>
      @else
        <a href="#" class="group flex items-center gap-3 px-4 py-2 rounded-lg bg-gray-800/40 hover:bg-indigo-600 transition duration-300 hover:scale-[1.02] shadow-md hover:shadow-xl">
          <span class="group-hover:tracking-wide transition-all duration-300">{{ $item }}</span>
          <svg class="w-4 h-4 text-indigo-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      @endif
    @endforeach
  @else
    @foreach (['Perfil', 'Compras', 'sla', 'sla'] as $item)
      @if ($item === 'Perfil')
        <label for="perfil-toggle" class="group flex items-center gap-3 px-4 py-2 rounded-lg bg-gray-800/40 hover:bg-indigo-600 transition duration-300 hover:scale-[1.02] shadow-md hover:shadow-xl cursor-pointer">
          <span class="group-hover:tracking-wide transition-all duration-300">{{ $item }}</span>
          <svg class="w-4 h-4 text-indigo-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </label>
      @else
        <a href="#" class="group flex items-center gap-3 px-4 py-2 rounded-lg bg-gray-800/40 hover:bg-indigo-600 transition duration-300 hover:scale-[1.02] shadow-md hover:shadow-xl">
          <span class="group-hover:tracking-wide transition-all duration-300">{{ $item }}</span>
          <svg class="w-4 h-4 text-indigo-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      @endif
    @endforeach
  @endif
</nav>


    <!-- Divisor inferior -->
    <hr class="border-indigo-600 opacity-30 my-6">

<!-- Botão Sair com efeito animado -->
<a href="http://127.0.0.1:8080" class="relative px-5 py-2 font-medium text-white group">
    <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-red-500 group-hover:bg-red-700 group-hover:skew-x-12"></span>
    <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-red-700 group-hover:bg-red-500 group-hover:-skew-x-12"></span>

    <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-red-600 -rotate-12"></span>
    <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-red-400 -rotate-12"></span>
    <span class="relative">Sair</span>
</a>


    <!-- Rodapé -->
    <p class="text-xs text-center text-gray-500 mt-6">&copy; 2025 <strong class="text-indigo-400">Hydrax</strong></p>
  </div>
</aside>


    <!-- Nome + Foto -->
    <div class="flex items-center gap-4 text-white font-[Poppins]">
      <img src="{{ $foto }}" alt="Foto de perfil" class="w-11 h-11 rounded-full border-2 border-purple-500 shadow-md object-cover">
      <div>
        <h1 class="text-2xl font-bold text-indigo-400 tracking-wide font-[Orbitron]">Hydrax</h1>
        <p class="text-sm text-white/80">Bem-vindo, <span class="font-semibold text-white">{{ $nome }}</span></p>
      </div>
    </div>

<!-- Barra de Pesquisa Interativa -->
<div class="hidden md:flex flex-1 justify-center px-4">
  <div class="relative w-full max-w-xs group">
    <!-- Input -->
    <input
      type="text"
      id="searchInput"
      placeholder="Search"
      class="w-full pl-10 pr-3 py-1.5 rounded-md border border-white/30 bg-gray-800/30 text-sm text-white/60 placeholder-gray-400 focus:outline-none hover:text-white focus:ring-2 focus:ring-indigo-500 focus:bg-gray-900 transition-all duration-300 group-focus:w-72 group-focus:pl-12"
    />
    
    <!-- Ícone da lupa -->
    <div
      class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 transition-all duration-300 group-focus:left-3.5 group-focus:text-indigo-500 group-focus:scale-110"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1110 3a7 7 0 016.65 13.65z" />
      </svg>
    </div>
  </div>
</div>


    <!-- Menu -->
    <nav class="hidden md:flex items-center space-x-8 text-white/80 text-sm font-[Poppins] ml-auto">
      <a href="#" class="hover:text-purple-400 transition">Início</a>
      <a href="#" class="hover:text-purple-400 transition">Lançamentos</a>
      <a href="#" class="hover:text-purple-400 transition">Ofertas</a>
      <a href="#" class="hover:text-purple-400 transition">Contato</a>

      <!-- Endereço Dropdown -->
      <div class="relative" id="enderecoWrapper">
        <button id="enderecoBtn" class="hover:text-purple-400 transition">Endereço ▾</button>
        <div id="enderecoDropdown" class="absolute hidden bg-gray-900 border border-purple-600 rounded-md shadow-lg mt-2 py-2 min-w-[180px] z-50">
          @if ($isFornecedor)
            <a href="{{ route('fornecedor.endereco.create', $usuario->id) }}" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Cadastrar Endereço</a>
            <a href="{{ route('fornecedor.endereco.index', $usuario->id) }}" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Listar Endereços</a>
          @else
            <a href="{{ route('endereco.create', ['id' => $usuario->id]) }}" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Cadastrar Endereço</a>
            <a href="{{ route('usuario.enderecos', ['id' => $usuario->id]) }}" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Listar Endereços</a>
          @endif
        </div>
      </div>

      <a href="#" class="relative hover:text-purple-400 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13H5.4" />
        </svg>
        Carrinho
      </a>
    </nav>
  </div>

  
</header>


<!-- Script -->
<script>
  const btn = document.getElementById('enderecoBtn');
  const dropdown = document.getElementById('enderecoDropdown');
  const wrapper = document.getElementById('enderecoWrapper');

  let timeout;

  wrapper.addEventListener('mouseenter', () => {
    clearTimeout(timeout);
    dropdown.classList.remove('hidden');
  });

  wrapper.addEventListener('mouseleave', () => {
    timeout = setTimeout(() => {
      dropdown.classList.add('hidden');
    }, 200); // tempo suficiente pro mouse alcançar
  });
</script>

<input type="checkbox" id="perfil-toggle" class="hidden peer" />
<div class="fixed inset-0 z-[99] bg-black/40 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none peer-checked:opacity-100 peer-checked:pointer-events-auto transition-all duration-500 ease-in-out">
  <div class="relative w-[92%] max-w-2xl bg-gradient-to-br from-gray-900/60 via-gray-800/600 to-gray-900/60 rounded-3xl p-8 shadow-2xl border border-indigo-600/50 animate-fade-in-up">

    <!-- Botão de fechar -->
    <label for="perfil-toggle" class="absolute top-4 right-4 text-white text-2xl cursor-pointer hover:text-pink-400 transition duration-300 transform">
      ✕
    </label>

    <!-- Título animado -->
    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-400 bg-[length:300%_300%] bg-left animate-gradient-x mb-8 text-center drop-shadow-lg">
      {{ $isFornecedor ? 'Dados do Fornecedor' : 'Dados do Usuário' }}
    </h2>

    <!-- Conteúdo do card -->
    <div class="space-y-4 text-white/90 text-sm sm:text-base font-medium tracking-wide leading-relaxed bg-gray-800/60 p-6 rounded-xl shadow-inner border border-indigo-500/20">
      @if ($isFornecedor)
        <p><span class="text-indigo-400 font-semibold">Empresa:</span> {{ $usuario->nome_empresa }}</p>
        <p><span class="text-indigo-400 font-semibold">CNPJ:</span> {{ $usuario->cnpj }}</p>
        <p><span class="text-indigo-400 font-semibold">Email:</span> {{ $usuario->email }}</p>
        <p><span class="text-indigo-400 font-semibold">Telefone:</span> {{ $usuario->telefone }}</p>
      @else
        <p><span class="text-indigo-400 font-semibold">Nome:</span> {{ $usuario->nome_completo }}</p>
        <p><span class="text-indigo-400 font-semibold">CPF:</span> {{ $usuario->cpf }}</p>
        <p><span class="text-indigo-400 font-semibold">Email:</span> {{ $usuario->email }}</p>
        <p><span class="text-indigo-400 font-semibold">Telefone:</span> {{ $usuario->telefone }}</p>
      @endif
    </div>
  </div>
</div>




</body>
</html>