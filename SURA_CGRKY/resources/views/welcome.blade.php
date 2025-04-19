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

    .card {
      background: rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(75, 0, 119, 0.6);
      border-radius: 12px;
      padding: 1.5rem;
      color: rgba(200, 200, 255, 0.9);
      transition: background-color 0.3s ease;
    }

    /* Efeito apenas de mudança de cor nos links */
    .card:hover {
      background-color: rgba(75, 0, 119, 0.3);
    }

    .footer {
      font-size: 0.875rem;
      color: rgba(100, 100, 255, 0.7);
      text-align: center;
      margin-top: 2rem;
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

  <main class="pt-24 px-6 flex flex-col items-center justify-center">

    <section class="bg-black bg-opacity-50 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-4xl text-center border border-gray-800">
      <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-8">
        Painel de Administração
      </h2>

      <p class="text-gray-300 mb-10">Gerencie cadastros, acessos e operações do sistema</p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
        <!-- Card: Cadastrar Usuário -->
        <a href="{{ route('usuario_final.create') }}" class="card">
          <h3 class="text-lg font-semibold text-indigo-400 mb-2">➕ Cadastrar Usuário Final</h3>
          <p class="text-gray-400">Adicione novos usuários ao sistema com permissões específicas.</p>
        </a>

        <!-- Card: Login Usuário -->
        <a href="{{ route('login.form') }}" class="card">
          <h3 class="text-lg font-semibold text-indigo-400 mb-2">👥 Entrar como Usuário</h3>
          <p class="text-gray-400">Acesse a plataforma como usuário comum para visualizar funcionalidades.</p>
        </a>

        <!-- Card: Login Administrador -->
        <a href="{{ route('admin.login.form') }}" class="card">
          <h3 class="text-lg font-semibold text-indigo-400 mb-2">🛠️ Entrar como Administrador</h3>
          <p class="text-gray-400">Gerencie todos os recursos da aplicação como administrador.</p>
        </a>

        <!-- Card: Login Fornecedor -->
        <a href="{{ route('fornecedor.login') }}" class="card">
          <h3 class="text-lg font-semibold text-indigo-400 mb-2">🏪 Entrar como Fornecedor</h3>
          <p class="text-gray-400">Acesse funcionalidades específicas para fornecedores.</p>
        </a>
      </div>
    </section>

    <footer class="footer">
      &copy; 2025 <strong>SURA</strong> - Sistema Unificado de Registro e Administração
    </footer>
  </main>

</body>
</html>
