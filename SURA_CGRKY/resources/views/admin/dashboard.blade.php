<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SURA - Administração</title>
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

  <header class="fixed top-0 left-0 w-full z-50 backdrop-blur-lg bg-black/50 border-b-2 border-purple-700/50 rounded-b-lg shadow-lg transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center gap-6 md:gap-0">
      <!-- Título + Saudação -->
      <div class="flex flex-col text-left text-white mr-auto">
        <h1 class="text-2xl font-bold tracking-wider drop-shadow-md text-purple-300">SURA</h1>
        <p class="text-sm md:text-base text-white/80 mt-1">
          Bem-vindo, <span class="font-semibold text-white">{{ $admin->nome_usuario }}</span>
        </p>
      </div>

      <!-- Título ADM -->
      <div class="flex justify-center items-center">
        <h1 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-6">
          ADMINISTRADOR
        </h1>
      </div>
    </div>
  </header>

  <main class="pt-40 px-6 flex flex-col items-center justify-center">
    <section class="bg-black bg-opacity-50 backdrop-blur-md p-10 rounded-3xl shadow-[0_20px_50px_rgba(124,58,237,0.3)] w-full max-w-md text-center border border-purple-600/30 relative overflow-hidden">

      <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-6">
        Funções ADM
      </h2>

      <!-- Botão para listar todos os fornecedores -->
      <a href="{{ route('admin.fornecedores') }}" class="mt-6 inline-block bg-purple-600 px-6 py-3 rounded-lg text-white font-bold text-lg hover:bg-purple-700 transition-all duration-300">
        Ver Todos os Fornecedores
      </a>

    </section>
  </main>


  <footer class="mt-16 text-center text-sm text-white/60 hover:text-[#7f5af0] transition-colors duration-300">
    &copy; 2025 <strong>SURA</strong> - Sistema Unificado de Registro e Administração
  </footer>

</body>
</html>
