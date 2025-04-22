<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
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

    /* Aumento do tamanho do card */
    .card {
      background: rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(75, 0, 119, 0.6);
      border-radius: 12px;
      padding: 2.5rem; /* Aumento no padding para mais espaço interno */
      color: rgba(200, 200, 255, 0.9);
      transition: background-color 0.3s ease;
      width: 100%; /* Ajusta a largura para ocupar mais espaço */
      max-width: 700px; /* Aumento do max-width para um card maior */
      margin: 1.5rem auto; /* Centraliza o card e aumenta a margem */
    }

    .card p {
      font-size: 1.1rem; /* Aumentando o tamanho da fonte dos dados */
    }

    .card a {
      margin-top: 1.5rem; /* Adiciona espaçamento acima do link */
    }

    /* Adicionando margin-top ao contêiner principal para empurrar o conteúdo para baixo */
    main {
      margin-top: 10vh; /* Ajustando para empurrar para baixo */
    }
  </style>
</head>
<body>

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

  <!-- Main Content -->
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

        <!-- Link para página de endereço com animação em Tailwind -->
        <a href="{{ route('fornecedor.endereco.create', ['id' => $usuario->id]) }}" class="relative inline-flex items-center justify-start px-4 py-2 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
          <span class="w-40 h-40 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-7 ml-7 group-hover:ml-0 group-hover:mb-28 group-hover:translate-x-0"></span>
          <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">
            Cadastrar/Editar Endereço
          </span>
        </a>
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

        <!-- Link para página de endereço do usuário com animação em Tailwind -->
        <a href="{{ route('endereco.create', ['id' => $usuario->id]) }}" class="relative inline-flex items-center justify-start px-4 py-2 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
          <span class="w-40 h-40 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-7 ml-7 group-hover:ml-0 group-hover:mb-28 group-hover:translate-x-0"></span>
          <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">
            Endereço
          </span>
        </a>
      </div>
    @endif

  </main>

  <footer class="mt-16 text-center text-sm text-white/60 hover:text-[#7f5af0] transition-colors duration-300">
    &copy; 2025 <strong>SURA</strong> - Sistema Unificado de Registro e Administração
  </footer>

</body>
</html>
