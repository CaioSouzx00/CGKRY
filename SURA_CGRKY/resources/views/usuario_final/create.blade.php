<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SURA - Cadastro Usuário</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
  <style>
    @keyframes moveBackground {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(45deg, rgb(23, 2, 28), rgb(28, 5, 53), #000000);
      background-size: 400% 400%;
      animation: moveBackground 15s ease infinite;
      position: relative;
      font-family: 'Poppins', sans-serif;
    }

    #particles-js {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1; /* Para o fundo de partículas ficar atrás do conteúdo */
    }
  </style>
</head>
<body class="min-h-screen overflow-hidden">
    <!-- Botão voltar -->
    <a href="{{ route('fornecedor.login') }} "
     class="fixed top-4 left-4 z-50 w-9 h-9 flex items-center justify-center rounded-full bg-indigo-600 hover:bg-purple-700 transition-colors duration-300 shadow-[0_4px_20px_rgba(102,51,153,0.5)]"
     title="Voltar para o login">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </a>
  <!-- Partículas -->
  <div id="particles-js"></div>

  <main class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-2xl bg-black/30 border border-purple-700/25 rounded-2xl shadow-xl p-8">

      <h1 class="text-3xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-200 mb-6">
        Cadastro de Usuário
      </h1>

      <!-- Mensagens de erro ou sucesso -->
      @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-6 rounded">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Formulário -->
      <form action="{{ route('usuario_final.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-2 gap-4">
          <!-- Primeira coluna -->
          <div>
            <label for="nome_completo" class="block text-sm font-medium text-gray-300">Nome Completo</label>
            <input id="nome_completo" type="text" name="nome_completo" value="{{ old('nome_completo') }}" required minlength="3" maxlength="255"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <div>
            <label for="sexo" class="block text-sm font-medium text-gray-300">Sexo</label>
            <select id="sexo" name="sexo" required
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white/30 border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
              <option value="" class="bg-indigo-500 text-white">Selecione seu sexo</option>
              <option value="masculino" class="bg-indigo-500 text-white"{{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
              <option value="feminino" class="bg-indigo-500 text-white"{{ old('sexo') == 'feminino' ? 'selected' : '' }}>Feminino</option>
              <option value="outro" class="bg-indigo-500 text-white"{{ old('sexo') == 'outro' ? 'selected' : '' }}>Outro</option>
            </select>
          </div>

          <div>
            <label for="data_nascimento" class="block text-sm font-medium text-gray-300">Data de Nascimento</label>
            <input id="data_nascimento" type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" required
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white/30 border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-300">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required maxlength="255"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <!-- Segunda coluna -->
          <div>
            <label for="senha" class="block text-sm font-medium text-gray-300">Senha</label>
            <input id="senha" type="password" name="senha" required minlength="6"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <div>
            <label for="telefone" class="block text-sm font-medium text-gray-300">Telefone</label>
            <input id="telefone" type="text" name="telefone" value="{{ old('telefone') }}" required maxlength="15"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <div>
            <label for="cpf" class="block text-sm font-medium text-gray-300">CPF</label>
            <input id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" required minlength="11" maxlength="11"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

          <div>
            <label for="foto" class="block text-sm font-medium text-gray-300">Foto</label>
            <input id="foto" type="file" name="foto" accept="image/*"
              class="w-full mt-1 px-4 py-2 bg-gray-900/40 text-white/30 border border-indigo-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 file:bg-gray-900/40 file:text-indigo-500 file:border file:border-indigo-500 file:rounded file:text-indigo-500 hover:file:bg-indigo-500 hover:file:text-white transition-all duration-2000"/>
          </div>
        </div>

        <button type="submit" class="relative w-full mt-4 py-3 inline-flex items-center justify-center text-lg font-medium bg-black/20 text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group overflow-hidden">
  <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
  <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
    </svg>
  </span>
  <span class="relative">Cadastrar</span>
</button>
      </form>

      <footer class="mt-6 text-center text-xs text-gray-500">
        &copy; 2025 <strong>SURA</strong>. Todos os direitos reservados.
      </footer>
    </div>
  </main>

  <script>
    particlesJS("particles-js", {
      particles: {
        number: {
          value: 40, // Número de partículas
          density: {
            enable: true,
            value_area: 800
          }
        },
        color: {
          value: "#000" // Cor das partículas
        },
        shape: {
          type: "polygon",
          polygon: {
            nb_sides: 6 // Forma das partículas, hexágonos
          }
        },
        opacity: {
          value: 0.5,
          random: false,
        },
        size: {
          value: 4,
          random: true,
          anim: {
            enable: true,
            speed: 5,
            size_min: 0.3,
            sync: false
          }
        },
        line_linked: {
          enable: false // Sem linhas conectando as partículas
        },
        move: {
          enable: true,
          speed: 1.5,
          direction: "bottom", // Movimento para baixo
          random: false,
          straight: false,
          out_mode: "out", // Quando saem da tela, saem de vez
          bounce: false
        }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: {
            enable: true,
            mode: "repulse" // Efeito de afastamento das partículas do mouse
          },
          onclick: {
            enable: true,
            mode: "repulse" // Efeito de afastamento das partículas ao clicar
          },
          resize: true
        },
        modes: {
          repulse: {
            distance: 100, // Distância de repulsão
            duration: 0.4, // Tempo de duração da animação
          }
        }
      },
      retina_detect: true
    });
  </script>

</body>
</html>
