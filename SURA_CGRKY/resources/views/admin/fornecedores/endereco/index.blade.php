<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Endereços de {{ $fornecedor->nome_empresa }}</title>
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
      overflow-x: hidden;
      margin: 0;
      padding: 0;
      min-height: 100vh;
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

    /* Custom CSS for table and layout */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #4c4c8c;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #2a2a47;
    }

    tr:hover {
      background-color: #383856;
    }

    .action-btn {
      color: #5b8f3e;
      font-weight: bold;
      cursor: pointer;
    }

    .action-btn:hover {
      text-decoration: underline;
    }

    .delete-btn {
      color: #ff6347;
      font-weight: bold;
      cursor: pointer;
    }

    .delete-btn:hover {
      text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      table {
        font-size: 14px;
      }

      th, td {
        padding: 8px;
      }
    }
  </style>
</head>
<body>
  <!-- Animações -->
  <div class="particle particle1"></div>
  <div class="particle particle2"></div>
  <div class="particle particle3"></div>
  <div class="particle particle4"></div>
  <div class="particle particle5"></div>

  <div class="line line1"></div>
  <div class="line line2"></div>
  <div class="line line3"></div>

  <!-- Botão de Voltar (fixo no canto superior esquerdo, tamanho pequeno) -->
  <a href="{{ route('fornecedor.dashboard') }}"
     class="fixed top-4 left-4 z-50 w-9 h-9 flex items-center justify-center rounded-full bg-indigo-700 hover:bg-purple-600 transition-colors duration-300 shadow-md">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </a>

  <!-- Conteúdo -->
  <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
    <div class="bg-black bg-opacity-50 backdrop-blur-md border border-gray-700 shadow-xl rounded-3xl p-8 w-full max-w-6xl">
      <h2 class="text-3xl font-bold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-500 to-white">Endereços de {{ $fornecedor->nome_empresa }}</h2>

      @if (session('success'))
        <div class="mb-4 text-green-400 font-semibold text-center">
          {{ session('success') }}
        </div>
      @endif

      @if ($enderecos->isEmpty())
        <p class="text-center text-white">Nenhum endereço cadastrado ainda.</p>
      @else
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-white border-collapse">
            <thead class="bg-indigo-800 text-white uppercase text-xs">
              <tr>
                <th class="px-4 py-3">Cidade</th>
                <th class="px-4 py-3">CEP</th>
                <th class="px-4 py-3">Bairro</th>
                <th class="px-4 py-3">Estado</th>
                <th class="px-4 py-3">Rua</th>
                <th class="px-4 py-3">Ações</th>
              </tr>
            </thead>
            <tbody class="bg-gray-900 bg-opacity-50 border-t border-gray-700">
              @foreach ($enderecos as $endereco)
                <tr class="hover:bg-gray-800">
                  <td class="px-4 py-2">{{ $endereco->cidade }}</td>
                  <td class="px-4 py-2">{{ $endereco->cep }}</td>
                  <td class="px-4 py-2">{{ $endereco->bairro }}</td>
                  <td class="px-4 py-2">{{ $endereco->estado }}</td>
                  <td class="px-4 py-2">{{ $endereco->rua }}</td>
                  <td class="px-4 py-2">
                    <a href="{{ route('fornecedor.endereco.edit', ['id' => $fornecedor->id, 'endereco_id' => $endereco->id]) }}" class="action-btn">Editar</a> |
                    <form action="{{ route('fornecedor.endereco.destroy', ['id' => $fornecedor->id, 'endereco_id' => $endereco->id]) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este endereço?')">Excluir</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
    <footer class="mt-16 text-center text-sm text-white/60 hover:text-[#7f5af0] transition-colors duration-300">
      &copy; 2025 <strong>SURA</strong> - Sistema Unificado de Registro e Administração
    </footer>
</body>
</html>
