<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sidebar com botão X</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen relative">

  <!-- Toggle (checkbox) -->
  <input type="checkbox" id="menu-toggle" class="hidden peer" />

  <!-- Botão ☰ (aparece só quando menu fechado) -->
  <label for="menu-toggle" class="fixed top-4 left-4 z-50 text-white bg-indigo-200 p-2 rounded cursor-pointer peer-checked:hidden">
    ☰
  </label>

  <!-- Sidebar -->
  <aside class="fixed top-0 left-0 h-full w-64 bg-black text-white z-40 transform -translate-x-full peer-checked:translate-x-0 transition-transform duration-300">

    <!-- Botão ✕ (aparece dentro do menu quando aberto) -->
    <label for="menu-toggle" class="absolute top-4 right-4 text-white text-2xl cursor-pointer">
      ✕
    </label>

    <!-- Conteúdo do menu -->
    <div class="mt-16 px-4 bg-black">
      <div class="flex justify-center mb-6">
        <img src="/imagens/Post Jif 2025 (8).png" alt="Logo" class="w-32 h-32 object-cover">
      </div>

      <hr class="border-gray-500 opacity-40 mb-4">

      <nav class="space-y-3">
        <a href="{{ route('login.form') }}" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
          <img src="/imagens/Testes/6.png" alt="Entrar" class="w-6 h-6 mr-3"> Entrar
        </a>
        <a href="{{ route('usuario_final.create') }}" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
          <img src="/imagens/Post Jif 2025 (9).png" alt="Criar Conta" class="w-6 h-6 mr-3"> Criar Conta
        </a>
        <a href="{{ route('fornecedor.login') }}" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
          <img src="/imagens/Testes/8.png" alt="Fornecedores" class="w-6 h-6 mr-3"> Fornecedores
        </a>
        <a href="{{ route('admin.login.form') }}" class="flex items-center text-lg pl-4 py-2 hover:bg-indigo-600 rounded transition">
          <img src="/imagens/Testes/7.png" alt="Administração" class="w-6 h-6 mr-3"> Administração
        </a>
      </nav>

      <hr class="border-gray-500 opacity-40 my-6">

      <p class="text-xs text-center text-gray-400">&copy; 2025 <strong>Hydrax</strong></p>
    </div>
  </aside>

  <!-- Conteúdo principal -->
  <main class="transition-all duration-300 peer-checked:ml-64 ml-0">
  <section class="h-20"></section>
    <section class="bg-gradient-to-r from-indigo-800 to-indigo-600 py-20 text-center">
      <div class="container mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-white">O melhor do esporte em um só lugar</h2>
        <p class="text-lg text-gray-200 mb-6">Confira nossas categorias e escolha o melhor tênis para seu esporte favorito!</p>
        <a href="#Categorias" class="bg-white text-indigo-700 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-200 transition">Ver Categorias</a>
      </div>
    </section>
    <section class="h-20"></section>


<section id="Categorias" class="py-16">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-white mb-8 tracking-wide border-b-4 border-indigo-600 pb-2">
      Categorias
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-12">


<!-- Vôlei -->
<div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-transform transform hover:-translate-y-2 relative overflow-hidden">
<div class="relative h-64 rounded-lg mb-4 overflow-hidden group">
  <img src="https://i.pinimg.com/736x/06/05/81/0605810533a00cd0973c46c3949d7c44.jpg"
       alt="Imagem Ran Takahashi"
       class="h-full w-full object-cover transition-opacity duration-500 group-hover:opacity-0"/>
  <div class="absolute inset-0 bg-gray-900 bg-opacity-80 text-white flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500 group-hover:opacity-100 text-center">
    <h4 class="text-xl font-bold mb-2 border-b-4 border-indigo-600 inline-block"">Ran Takahashi</h4>
    <p class="text-sm">Destaque da seleção japonesa, conhecido por sua versatilidade e explosão.</p>
    <p class="text-xs mt-2 text-gray-300">O vôlei exige reflexo rápido, agilidade e trabalho em equipe para vencer cada ponto.</p>
  </div>
</div>
<h3 class="text-xl font-semibold text-white text-center">Vôlei</h3>
<a href="{{ route('login.form') }}" class="relative rounded px-5 py-2.5 overflow-hidden group bg-indigo-600 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-indigo-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all duration-300 mt-4 w-full block text-center">
  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
  <span class="relative">Comprar</span>
</a>
</div>

<!-- Tênis de mesa -->
<div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-transform transform hover:-translate-y-2 relative overflow-hidden">
<div class="relative h-64 rounded-lg mb-4 overflow-hidden group">
  <img src="https://i.pinimg.com/736x/80/64/72/80647230c3fe33e12698ff04cefe9711.jpg"
       alt="Imagem Hugo Calderano"
       class="h-full w-full object-cover transition-opacity duration-500 group-hover:opacity-0"/>
  <div class="absolute inset-0 bg-gray-900 bg-opacity-80 text-white flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500 group-hover:opacity-100 text-center">
    <h4 class="text-xl font-bold mb-2 border-b-4 border-indigo-600 inline-block"">Hugo Calderano</h4>
    <p class="text-sm">Principal nome do tênis de mesa brasileiro, top mundial.</p>
    <p class="text-xs mt-2 text-gray-300">O tênis de mesa combina reflexos extremos, controle e raciocínio veloz.</p>
  </div>
</div>
<h3 class="text-xl font-semibold text-white text-center">Tênis de mesa</h3>
<a href="{{ route('login.form') }}" class="relative rounded px-5 py-2.5 overflow-hidden group bg-indigo-600 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-indigo-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all duration-300 mt-4 w-full block text-center">
  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
  <span class="relative">Comprar</span>
</a>
</div>

<!-- Futebol -->
<div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-transform transform hover:-translate-y-2 relative overflow-hidden">
<div class="relative h-64 rounded-lg mb-4 overflow-hidden group">
  <img src="https://i.pinimg.com/736x/b3/e8/fd/b3e8fd3a38662282046fd030fd96c588.jpg"
       alt="Imagem Neymar"
       class="h-full w-full object-cover transition-opacity duration-500 group-hover:opacity-0"/>
  <div class="absolute inset-0 bg-gray-900 bg-opacity-80 text-white flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500 group-hover:opacity-100 text-center">
    <h4 class="text-xl font-bold mb-2 border-b-4 border-indigo-600 inline-block"">Neymar Jr.</h4>
    <p class="text-sm">Ídolo brasileiro conhecido por sua criatividade, dribles e gols decisivos.</p>
    <p class="text-xs mt-2 text-gray-300">O futebol é o esporte mais popular do mundo, misturando técnica, tática e emoção.</p>
  </div>
</div>
<h3 class="text-xl font-semibold text-white text-center">Futebol</h3>
<a href="{{ route('login.form') }}" class="relative rounded px-5 py-2.5 overflow-hidden group bg-indigo-600 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-indigo-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all duration-300 mt-4 w-full block text-center">
  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
  <span class="relative">Comprar</span>
</a>
</div>

<!-- Basquete -->
<div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-transform transform hover:-translate-y-2 relative overflow-hidden">
<div class="relative h-64 rounded-lg mb-4 overflow-hidden group">
  <img src="https://i.pinimg.com/736x/d2/a0/4b/d2a04b5ff9b4d58f72fafc95ec35b134.jpg"
       alt="Imagem LeBron James"
       class="h-full w-full object-cover transition-opacity duration-500 group-hover:opacity-0"/>
  <div class="absolute inset-0 bg-gray-900 bg-opacity-80 text-white flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500 group-hover:opacity-100 text-center">
    <h4 class="text-xl font-bold mb-2 border-b-4 border-indigo-600 inline-block"">LeBron James</h4>
    <p class="text-sm">Um dos maiores nomes da NBA, símbolo de excelência e longevidade.</p>
    <p class="text-xs mt-2 text-gray-300">O basquete envolve força, precisão e raciocínio rápido em quadra.</p>
  </div>
</div>
<h3 class="text-xl font-semibold text-white text-center">Basquete</h3>
<a href="{{ route('login.form') }}" class="relative rounded px-5 py-2.5 overflow-hidden group bg-indigo-600 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-indigo-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all duration-300 mt-4 w-full block text-center">
  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
  <span class="relative">Comprar</span>
</a>
</div>

    </div>
  </div>
</section>

<!-- Rodapé -->
<footer class="bg-gray-950 text-gray-300 mt-10 pt-10 border-t border-gray-700">
<div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 pb-10 text-sm">

  <!-- Institucional -->
  <div>
    <h3 class="text-white font-bold mb-4">Institucional</h3>
    <ul class="space-y-2">
      <li><a href="#" class="hover:text-indigo-400">Cadastre-se para receber novidades</a></li>
      <li><a href="#" class="hover:text-indigo-400">Cartão presente</a></li>
      <li><a href="#" class="hover:text-indigo-400">Mapa do site</a></li>
      <li><a href="#" class="hover:text-indigo-400">Black Friday</a></li>
      <li><a href="#" class="hover:text-indigo-400">Acompanhe seu pedido</a></li>
    </ul>
  </div>

  <!-- Ajuda -->
  <div>
    <h3 class="text-white font-bold mb-4">Ajuda</h3>
    <ul class="space-y-2">
      <li><a href="#" class="hover:text-indigo-400">Dúvidas gerais</a></li>
      <li><a href="#" class="hover:text-indigo-400">Encontre seu tamanho</a></li>
      <li><a href="#" class="hover:text-indigo-400">Entregas</a></li>
      <li><a href="#" class="hover:text-indigo-400">Pedidos</a></li>
      <li><a href="#" class="hover:text-indigo-400">Devoluções</a></li>
      <li><a href="#" class="hover:text-indigo-400">Pagamentos</a></li>
      <li><a href="#" class="hover:text-indigo-400">Produtos</a></li>
      <li><a href="#" class="hover:text-indigo-400">Corporativo</a></li>
      <li><a href="#" class="hover:text-indigo-400">Fale conosco</a></li>
    </ul>
  </div>

  <!-- Sobre -->
  <div>
    <h3 class="text-white font-bold mb-4">Sobre a Hydrax</h3>
    <ul class="space-y-2">
      <li><a href="#" class="hover:text-indigo-400">Propósito</a></li>
      <li><a href="#" class="hover:text-indigo-400">Sustentabilidade</a></li>
      <li><a href="#" class="hover:text-indigo-400">Sobre a SURA_CGKRY, Inc.</a></li>
      <li><a href="#" class="hover:text-indigo-400">Redes sociais</a></li>
    </ul>
  </div>

  <!-- Pagamento e apps -->
  <div>
    <h3 class="text-white font-bold mb-4">Formas de pagamento</h3>
    <ul class="space-y-2">
      <li>Mastercard</li>
      <li>Visa</li>
      <li>Amex</li>
      <li>Elo</li>
      <li>Hipercard</li>
      <li>Discover</li>
      <li>Pix</li>
    </ul>
  </div>
</div>

<!-- Linha inferior -->
<div class="border-t border-gray-700 text-center text-xs text-gray-500 py-6 px-4">
  <p>Brasil | <a href="#" class="hover:text-indigo-400">Política de privacidade</a>| <a href="#" class="hover:text-indigo-400">Política de cookies</a> | <a href="#" class="hover:text-indigo-400">Termos de uso</a></p>
  <p class="mt-2">&copy; 2025 <strong>Hydrax</strong>. Todos os direitos reservados.</p>
</div>
</footer>
  </main>

</body>
</html>
