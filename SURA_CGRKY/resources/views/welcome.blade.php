<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SURA - Administração</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes moveBackground {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    body {
      animation: moveBackground 15s ease-in-out infinite;
      background-size: 400% 400%;
      background-image: linear-gradient(45deg, #000000, #1a0d5c, #4b0077, #000000);
    }
  </style>
</head>
<body class="text-white min-h-screen flex flex-col items-center justify-center font-sans">

  <div class="bg-black bg-opacity-50 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-md text-center border border-gray-800 transition-transform duration-500">
    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-white bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-700 ease-in-out drop-shadow-xl mb-10">
      Painel da Administração
    </h1>

    <div class="flex flex-col gap-5">
      <a href="{{ route('usuario_final.create') }}"
         class="rounded-md px-4 py-2 overflow-hidden relative group cursor-pointer border-2 font-semibold border-indigo-600 text-indigo-600">
        <span class="absolute w-64 h-0 transition-all duration-500 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
        <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">
          Cadastrar Usuário Final
        </span>
      </a>

      <a href="{{ route('login.form') }}"
         class="rounded-md px-4 py-2 overflow-hidden relative group cursor-pointer border-2 font-semibold border-indigo-600 text-indigo-600">
        <span class="absolute w-64 h-0 transition-all duration-500 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
        <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">
          Entrar como Usuário
        </span>
      </a>

      <a href="{{ route('admin.login.form') }}"
         class="rounded-md px-4 py-2 overflow-hidden relative group cursor-pointer border-2 font-semibold border-indigo-600 text-indigo-600">
        <span class="absolute w-64 h-0 transition-all duration-500 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
        <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">
          Entrar como Administrador
        </span>
      </a>

      <a href="{{ route('fornecedor.login') }}"
         class="rounded-md px-4 py-2 overflow-hidden relative group cursor-pointer border-2 font-semibold border-indigo-600 text-indigo-600">
        <span class="absolute w-64 h-0 transition-all duration-500 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
        <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">
          Entrar como Fornecedor
        </span>
      </a>
    </div>
  </div>

  <footer class="mt-12 text-sm text-gray-500 hover:text-indigo-400 transition duration-500">
    &copy; 2025 <span class="font-bold">SURA</span> - Sistema Unificado de Registro e Administração
  </footer>

</body>
</html>
