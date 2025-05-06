<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Adm</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Particles.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
  @keyframes moveBackground {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  body {
    background: linear-gradient(45deg,rgb(35, 6, 41),rgb(74, 14, 138), #000000);
    background-size: 400% 400%;
    animation: moveBackground 15s ease infinite;
    position: relative;
    z-index: 1; /* Garante que o conteúdo esteja por cima do fundo */
  }

  #particles-js {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Faz com que o fundo de partículas fique atrás do conteúdo */
  }
</style>
<body class="min-h-screen overflow-hidden">

<nav class="fixed top-64 right-[calc(100%-12.5rem)] h-[calc(100vh-30rem)] bg-black/25 backdrop-blur-md border border-white/25 shadow-xl text-white z-10 rounded-3xl overflow-hidden group transition-all duration-300 w-14 hover:w-48 flex flex-col justify-between items-start py-4 origin-right">
    
    <!-- Itens do menu -->
    <div class="flex flex-col space-y-4 w-full px-2">
      <a href="#" class="flex items-center space-x-3 px-2 py-2 hover:bg-purple-600/30 rounded-md transition">
        <span class="text-lg"></span>
        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Ação Futura</span>
      </a>
      <a href="#" class="flex items-center space-x-3 px-2 py-2 hover:bg-purple-600/30 rounded-md transition">
        <span class="text-lg"></span>
        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Ação Futura</span>
      </a>
    </div>
    <div class="flex flex-col justify-between space-y-4 w-full px-2">
      <!-- Botão sair -->
      <a href="http://127.0.0.1:8080" class="flex items-center space-x-3 px-2 py-2 hover:bg-purple-600/30 rounded-md w-full mb-2 transition group">
        <!-- Ícone -->
        <img src="/imagens/Testes.png" alt="Ícone de Sair" class="w-5 h-5" />
        <!-- Texto -->
        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Sair</span>
      </a>
    </div>
  </nav>
  <!-- Conteúdo principal -->
  <div class="ml-[17.5rem] mt-8 mr-64 h-[calc(7vh-0.5rem)] bg-black/25 backdrop-blur-md border border-white/25 shadow-xl text-white rounded-3xl p-6 flex items-center justify-center"> 
    <div class="h-8 w-[2%] mr-32 bg-black/20 rounded-2xl shadow-inner px-4 flex items-center justify-center">
      <h1 class="flex items-center justify-left">Hz</h1>
    </div>
    <div class="h-8 w-[70%] bg-black/20 rounded-2xl shadow-inner px-4 flex items-center">
      <p class="text-sm md:text-base text-white">
        Bem-vindo, <span class="font-semibold text-white">{{ $admin->nome_usuario }}</span>, ao seu painel de administração.
      </p>
    </div> 
  </div>

  <!-- Retângulo principal ao lado da sidebar -->
  <div class="ml-[13.5rem] mt-5 mr-48 h-[calc(100vh-10rem)] bg-black/25 backdrop-blur-md border border-white/25 shadow-xl text-white rounded-2xl p-6 flex flex-col justify-between">

    <!-- Linha superior -->
    <div class="flex justify-between gap-4 mb-4 h-[60%]">
      <!-- Médio (esquerda - altura maior, largura menor) -->
      <div class="w-1/5 bg-black/20 rounded-xl border border-white/10 shadow-inner p-4">
        <h1 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-700 to-white mb-6 text-center">
          Painel Fornecedor
        </h1>

        <!-- Links empilhados -->
        <div class="flex flex-col space-y-4">
          <a href="{{ route('admin.fornecedores') }}" class="w-full relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group shadow-[0_4px_20px_rgba(128,0,255,0.8)]">
            <span class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
            <span class="relative w-full text-left text-purple-600 transition-colors duration-300 ease-in-out group-hover:text-white">Pendentes</span>
          </a>

          <a href="#_" class="w-full relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group shadow-[0_4px_20px_rgba(128,0,255,0.8)]">
            <span class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
            <span class="relative w-full text-left text-purple-600 transition-colors duration-300 ease-in-out group-hover:text-white">Listar</span>
          </a>

          <a href="#_" class="w-full relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group shadow-[0_4px_20px_rgba(128,0,255,0.8)]">
            <span class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
            <span class="relative w-full text-left text-purple-600 transition-colors duration-300 ease-in-out group-hover:text-white">Estoque</span>
          </a>
        </div>
      </div>

      <!-- Grande (direita - altura maior) -->
      <div class="w-3/4 bg-black/20 rounded-xl border border-white/30 shadow-inner p-4">
        <!-- Canvas do gráfico -->
        <canvas id="userChart"></canvas>
      </div>
    </div>

    <!-- Linha inferior -->
    <div class="flex justify-between gap-4 h-[35%]">
      <div class="w-1/5 bg-black/30 rounded-xl border border-white/30 shadow-inner p-4">
        <div class="w-full h-full aspect-square rounded-xl relative overflow-hidden">
          <div class="relative w-full h-full rounded-lg overflow-hidden group">
            <img src="/imagens/Post Jif 2025 (8).png"
                 alt="Logo"
                 class="h-full w-full object-cover transition-opacity duration-500 group-hover:opacity-0"/>
            <div class="absolute inset-0 bg-gray-900 bg-opacity-80 text-white flex flex-col items-center justify-center px-4 text-center opacity-0 transition-opacity duration-500 group-hover:opacity-100">
              <h4 class="text-lg font-bold mb-1 border-b-4 border-indigo-600 inline-block">Hydrax</h4>
              <p class="text-xs leading-tight">Este é o painel de Admins.</p>
              <p class="text-[10px] mt-1 text-gray-300">Gerenciamento de Usuários, Controle de Conteúdo, Acesso a Relatórios, Gerenciamento de Configurações e Monitoramento de Atividades.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="w-3/4 flex gap-4">
        <div class="w-1/4 bg-black/20 rounded-xl border border-white/30 shadow-inner p-4">
          <h1>Ações futuras</h1>
          <a href="#_" class="px-5 py-2.5 relative rounded group overflow-hidden font-medium bg-purple-50 text-purple-600 inline-block">
            <span class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-purple-600 group-hover:h-full opacity-90"></span>
            <span class="relative group-hover:text-white">Futuro</span>
          </a>
        </div>
        
        <div class="w-1/4 bg-black/20 rounded-xl border border-white/30 shadow-inner p-4">
          <h1>Ações futuras</h1>
          <a href="#_" class="px-5 py-2.5 relative rounded group overflow-hidden font-medium bg-purple-50 text-purple-600 inline-block">
            <span class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-purple-600 group-hover:h-full opacity-90"></span>
            <span class="relative group-hover:text-white">Futuro</span>
          </a>
        </div>

        <div class="w-1/4 bg-black/20 rounded-xl border border-white/30 shadow-inner p-4">
          <h1>Ações futuras</h1>
          <a href="#_" class="px-5 py-2.5 relative rounded group overflow-hidden font-medium bg-purple-50 text-purple-600 inline-block">
            <span class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-purple-600 group-hover:h-full opacity-90"></span>
            <span class="relative group-hover:text-white">Futuro</span>
          </a>
        </div>

        <div class="w-1/4 bg-black/20 rounded-xl border border-white/30 shadow-inner p-4">
          <h1>Ações futuras</h1>
          <a href="#_" class="px-5 py-2.5 relative rounded group overflow-hidden font-medium bg-purple-50 text-purple-600 inline-block">
            <span class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-purple-600 group-hover:h-full opacity-90"></span>
            <span class="relative group-hover:text-white">Futuro</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="particles-js"></div>

  <script>
    particlesJS("particles-js", {
      "particles": {
        "number": {
          "value": 60,
          "density": {
            "enable": true,
            "value_area": 900
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
        },
        "opacity": {
          "value": 0.5,
          "random": true
        },
        "size": {
          "value": 3,
          "random": true
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 2,
          "direction": "none",
          "random": false,
          "straight": false,
          "out_mode": "out",
          "bounce": false
        }
      },
      "interactivity": {
        "events": {
          "onhover": {
            "enable": true,
            "mode": "repulse"
          },
          "onclick": {
            "enable": false
          },
          "resize": true
        }
      },
      "retina_detect": true
    });

    // Chart.js example for Users and Fornecedores
    var ctxUser = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(ctxUser, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],  // Exemplo de meses
        datasets: [{
          label: 'Usuários',
          data: [10, 20, 30, 40, 50], // Exemplo de dados para Usuários
          fill: false,
          borderColor: 'rgba(75, 192, 192, 1)',
          tension: 0.1
        },
        {
          label: 'Fornecedor',
          data: [5, 10, 15, 20, 25], // Exemplo de dados para Fornecedor
          fill: false,
          borderColor: 'rgba(255, 99, 132, 1)', // Cor diferente para a linha
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>
