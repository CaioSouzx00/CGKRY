<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Fornecedor</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Inter', sans-serif;
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

    .particle1 { width: 80px; height: 80px; top: 10%; left: 25%; animation-duration: 6s; }
    .particle2 { width: 100px; height: 100px; top: 50%; left: 60%; animation-duration: 7s; }
    .particle3 { width: 60px; height: 60px; top: 70%; left: 30%; animation-duration: 8s; }
    .particle4 { width: 120px; height: 120px; top: 20%; left: 75%; animation-duration: 9s; }
    .particle5 { width: 70px; height: 70px; top: 40%; left: 10%; animation-duration: 10s; }

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

    .line1 { width: 30vw; top: 20%; left: 5%; animation-duration: 12s; }
    .line2 { width: 40vw; top: 50%; left: 10%; animation-duration: 15s; }
    .line3 { width: 50vw; top: 70%; left: 15%; animation-duration: 18s; }
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

  <main class="flex flex-col items-center justify-center w-full h-full">
    <section class="bg-black bg-opacity-50 backdrop-blur-md p-8 rounded-3xl shadow-2xl w-full max-w-sm text-center border border-gray-800">
      <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-6">
        Login de Fornecedor
      </h1>

      <!-- Exibindo erros -->
      @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-6 rounded">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('fornecedor.login.post') }}" class="space-y-3">
        @csrf

        <input type="email" name="email" required placeholder="E-mail" class="h-10 px-4 rounded-md border border-gray-700 bg-gray-800 text-white placeholder-gray-400 text-sm w-full">
        
        <input type="password" name="senha" required placeholder="Senha" class="h-10 px-4 rounded-md border border-gray-700 bg-gray-800 text-white placeholder-gray-400 text-sm w-full">

        <button type="submit" class="relative inline-flex items-center justify-center w-full px-6 py-3 overflow-hidden text-sm font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group bg-transparent">
          <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
          <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </span>
          <span class="relative">Entrar</span>
        </button>
      </form>
    </section>

    <footer class="mt-12 text-sm text-gray-500 transition-all duration-700 ease-out hover:text-indigo-600">
      &copy; 2025 <strong>SURA</strong> - Sistema Unificado de Registro e Administração
    </footer>
  </main>

</body>
</html>
