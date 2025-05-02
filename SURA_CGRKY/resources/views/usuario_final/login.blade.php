<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hydrax - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

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

  .particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(113, 113, 253, 0.1);
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

<body class="h-screen overflow-hidden m-0 p-0 text-white font-sans bg-gradient-to-br from-[#1e1e2f] via-[#2a0e5a] to-[#1e2566] animate-[moveBackground_20s_linear_infinite]">
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
  <a href="http://127.0.0.1:8080"
     class="fixed top-4 left-4 z-50 w-9 h-9 flex items-center justify-center rounded-full bg-indigo-700 hover:bg-purple-600 transition-colors duration-300 shadow-[0_4px_20px_rgba(30,64,175,0.4)]"
     title="Voltar para o painel">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </a>

  <!-- Container Principal -->
  <div class="flex items-center justify-center w-full h-full">
    <main class="flex w-full max-w-7xl h-[90%] bg-black/30 rounded-md border border-gray-800 p-8 relative backdrop-blur-md shadow-[0_4px_20px_rgba(30,64,175,0.4)]">

      <!-- Imagem -->
      <div class="w-1/2 flex items-center justify-center rounded-md bg-cover bg-center shadow-[0_4px_20px_rgba(30,58,138,0.3)]" style="background-image: url('/imagens/Post Jif 2025_20250502_132319_0000.png');"></div>

      <!-- Área de Login -->
      <div class="w-1/2 bg-black/10 rounded-md flex items-center justify-center p-8 shadow-[0_4px_20px_rgba(30,58,138,0.3)]">
        <section class="p-8 rounded-3xl w-full max-w-sm text-left ">

          <div class="text-center max-w-md mx-auto space-y-3">
            <h2 class="text-base text-gray-300">Seja bem-vindo à</h2>
            <h1 class="text-4xl font-[Orbitron] font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-2xl">
              Hydrax
            </h1>
            <h3 class="text-base text-gray-400">
              Acompanhe lançamentos em tempo real e descubra os tênis esportivos mais desejados do mercado. Faça login e eleve seu estilo ao próximo nível.
            </h3>
          </div>

          <div class="h-5"></div>

          @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-6 rounded">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}" class="space-y-3">
            @csrf
            <div class="flex items-center space-x-3 mb-4">
              <img src="/imagens/Post Jif 2025/4.png" alt="email" class="w-6 h-6 text-indigo-500">
              <input type="email" name="email" required placeholder="E-mail"
                     class="h-10 px-4 rounded-md border border-indigo-500 bg-gray-800/50 text-white placeholder-gray-400 text-sm w-full shadow-[0_4px_20px_rgba(30,58,138,0.3)]">
            </div>
            <div class="flex items-center space-x-3 mb-4 relative">
  <img src="/imagens/Post Jif 2025/5.png" alt="senha" class="w-6 h-6 text-indigo-500">
  
  <input 
    type="password" 
    name="senha" 
    id="senha" 
    required 
    placeholder="Senha"
    class="h-10 px-4 pr-10 rounded-md border border-indigo-400 bg-gray-800/50 text-white placeholder-gray-400 text-sm w-full shadow-[0_4px_20px_rgba(30,58,138,0.3)]"
  >

  <!-- Botão para alternar visualização da senha -->
  <button 
    type="button" 
    onclick="toggleSenha()" 
    class="absolute right-3 top-2 w-6 h-6"
  >
    <img 
      src="/imagens/Post Jif 2025.png" 
      alt="Mostrar senha" 
      id="eye-icon" 
      class="w-6 h-6 opacity-30"
    >
  </button>
</div>

            <div class="mt-4 flex justify-between items-center">
              <a href="{{ route('password.enviarCodigo.form') }}" class="text-indigo-600 hover:text-indigo-800">Esqueceu sua senha?</a>
              <button type="submit"
                      class="relative inline-flex items-center justify-center w-20px px-3 py-2 overflow-hidden text-sm font-medium text-indigo-600 border-2 border-indigo-600 rounded-xl hover:text-white group bg-transparent ml-4 shadow-[0_4px_20px_rgba(30,58,138,0.3)]">
                <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease"></span>
                <span class="relative">Entrar</span>
              </button>
            </div>
          </form>

          <div class="mt-4">
            <p>Não possui conta?
              <a href="{{ route('usuario_final.create') }}" class="text-indigo-600 hover:text-indigo-800"> Cadastrar</a>
            </p>
          </div>

          <footer class="mt-16 text-center text-sm text-white/60 hover:text-[#7f5af0] transition-colors duration-300">
            &copy; 2025 <strong>Hydrax</strong> - Todos os direitos reservados
          </footer>

        </section>
      </div>
    </main>
  </div>
  <script>
  function toggleSenha() {
    const input = document.getElementById("senha");
    const icon = document.getElementById("eye-icon");

    if (input.type === "password") {
      input.type = "text";
      icon.src = "/imagens/Post Jif 2025 (2).png"; // imagem com olho aberto
      icon.alt = "Ocultar senha";
    } else {
      input.type = "password";
      icon.src = "/imagens/Post Jif 2025.png"; // imagem com olho fechado
      icon.alt = "Mostrar senha";
    }
  }
</script>
</body>
</html>