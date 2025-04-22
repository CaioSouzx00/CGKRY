<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      font-family: 'Inter', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
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
  <!-- Particles -->
  <div class="particle particle1"></div>
  <div class="particle particle2"></div>
  <div class="particle particle3"></div>
  <div class="particle particle4"></div>
  <div class="particle particle5"></div>

  <!-- Animated Lines -->
  <div class="line line1"></div>
  <div class="line line2"></div>
  <div class="line line3"></div>

  <!-- Header -->
  <header class="bg-black bg-opacity-60 backdrop-blur-md p-6 rounded-3xl shadow-2xl border border-gray-800 w-full max-w-4xl text-center">
    <h1 class="text-3xl font-extrabold text-white drop-shadow-lg">Bem-vindo, {{ $admin->nome_usuario }}</h1>
  </header>

  <!-- Main Content -->
  <main class="mt-10 w-full max-w-2xl bg-black bg-opacity-60 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-gray-800 flex flex-col items-center space-y-4">
    <a href="{{ route('fornecedores.create') }}" class="w-full text-center text-white bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-md transition duration-300">Cadastro de Fornecedor</a>
    <a href="{{ route('admin.logout') }}" class="w-full text-center text-white bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-md transition duration-300">Sair</a>
  </main>

  <!-- Footer -->
  <footer class="mt-12 text-sm text-gray-500 transition-all duration-700 ease-out hover:text-indigo-600 text-center">
    &copy; 2025 Empresa XYZ
  </footer>
</body>
</html>
