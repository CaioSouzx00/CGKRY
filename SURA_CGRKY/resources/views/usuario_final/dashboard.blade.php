<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    @keyframes moveBackground {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes particleMovement {
      0% { transform: translate(-50%, -50%) scale(0.8); }
      50% { transform: translate(50%, 50%) scale(1.5); }
      100% { transform: translate(-50%, -50%) scale(0.8); }
    }

    body {
      background: linear-gradient(135deg, #0d0d0d, #1a0033, #000c40);
      animation: moveBackground 20s linear infinite;
      overflow: hidden;
      margin: 0;
      padding: 0;
      height: 100vh;
      position: relative;
      color: white;
      font-family: 'Inter', sans-serif;
    }

    .particle {
      position: absolute;
      border-radius: 50%;
      background: rgba(100, 100, 255, 0.1);
      box-shadow: 0 0 15px rgba(100, 100, 255, 0.2);
      opacity: 0.7;
      pointer-events: none;
      animation: particleMovement 5s ease-in-out infinite;
    }

    .particle1 { width: 100px; height: 100px; top: 10%; left: 25%; animation-duration: 6s; }
    .particle2 { width: 120px; height: 120px; top: 50%; left: 60%; animation-duration: 7s; }
    .particle3 { width: 80px; height: 80px; top: 70%; left: 30%; animation-duration: 8s; }
    .particle4 { width: 150px; height: 150px; top: 20%; left: 75%; animation-duration: 9s; }
    .particle5 { width: 90px; height: 90px; top: 40%; left: 10%; animation-duration: 10s; }

    .line {
      position: absolute;
      background-color: rgba(138, 43, 226, 0.1);
      height: 2px;
      animation: lineMovement 10s infinite ease-in-out;
      box-shadow: 0 0 8px rgba(138, 43, 226, 0.4);
    }

    @keyframes lineMovement {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    .line1 { width: 50vw; top: 20%; left: 5%; animation-duration: 12s; }
    .line2 { width: 60vw; top: 50%; left: 10%; animation-duration: 15s; }
    .line3 { width: 70vw; top: 70%; left: 15%; animation-duration: 18s; }

    .card {
      background: rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(75, 0, 119, 0.6);
      border-radius: 12px;
      padding: 2.5rem;
      color: rgba(200, 200, 255, 0.9);
      transition: background-color 0.3s ease;
      width: 100%;
      max-width: 700px;
      margin: 1.5rem auto;
    }

    .card p {
      font-size: 1.1rem;
    }

    .card a {
      margin-top: 1.5rem;
    }

    main {
      margin-top: 10vh;
    }
  </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen relative">

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
<label for="menu-toggle" class="fixed top-4 left-4 z-50 text-white p-2 rounded cursor-pointer peer-checked:hidden">
  ☰
</label>

<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-black to-indigo-1000 text-white z-40 transform -translate-x-full peer-checked:translate-x-0 transition-transform duration-300">

  <!-- Botão ✕ (aparece dentro do menu quando aberto) -->
  <label for="menu-toggle" class="absolute top-4 right-4 text-white text-2xl cursor-pointer">
    ✕
  </label>

  <!-- Conteúdo do menu -->
  <div class="mt-16 px-4">
    <div class="flex justify-center mb-6">
      <img src="Post Jif 2025 (8).png" alt="Logo" class="w-32 h-32 object-cover rounded-full">
    </div>

    <hr class="border-gray-500 opacity-40 mb-4">

    <nav class="space-y-3">
      <a href="#" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
        <img src="Testes/6.png" alt="Entrar" class="w-6 h-6 mr-3"> Entrar
      </a>
      <a href="#" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
        <img src="Post Jif 2025 (9).png" alt="Criar Conta" class="w-6 h-6 mr-3"> Criar Conta
      </a>
      <a href="#" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
        <img src="Testes/8.png" alt="Fornecedores" class="w-6 h-6 mr-3"> Fornecedores
      </a>
      <a href="#" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
        <img src="Testes/7.png" alt="Administração" class="w-6 h-6 mr-3"> Administração
      </a>
    </nav>

    <hr class="border-gray-500 opacity-40 my-6">

    <p class="text-xs text-center text-gray-400">&copy; 2025 <strong>Hydrax</strong></p>
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

    <!-- Menu -->
    <nav class="hidden md:flex items-center space-x-8 text-white/80 text-sm font-[Poppins] ml-auto">
      <a href="#" class="hover:text-purple-400 transition">Início</a>
      <a href="#" class="hover:text-purple-400 transition">Lançamentos</a>
      <a href="#" class="hover:text-purple-400 transition">Ofertas</a>
      <a href="#" class="hover:text-purple-400 transition">Contato</a>

      <!-- Conta -->
      <div class="relative group">
        <button class="hover:text-purple-400 transition">Conta ▾</button>
        <div class="absolute hidden group-hover:block bg-gray-900 border border-purple-600 rounded-md shadow-lg mt-2 py-2 min-w-[160px]">
          <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Perfil</a>
          <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Meus pedidos</a>
          <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-purple-600/30">Sair</a>
        </div>
      </div>

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



  <!-- Conteúdo -->
  <main class="pt-24 px-6 flex flex-col items-center justify-center">
    @if ($isFornecedor)
      <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-8">
        Painel do Fornecedor
      </h2>
      <div class="card">
        <p><strong>Empresa:</strong> {{ $usuario->nome_empresa }}</p>
        <p><strong>CNPJ:</strong> {{ $usuario->cnpj }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>
      </div>
    @else
      <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-8">
        Painel do Usuário
      </h2>
      <div class="card">
        <p><strong>Nome:</strong> {{ $usuario->nome_completo }}</p>
        <p><strong>CPF:</strong> {{ $usuario->cpf }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>
      </div>
    @endif
  </main>
</body>
</html>