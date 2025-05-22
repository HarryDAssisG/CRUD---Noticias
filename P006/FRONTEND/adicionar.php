<?php include '../BACKEND/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Notícias</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">
  <!-- Cabeçalho -->
  <header class="bg-white shadow-md p-4 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-blue-600">Portal de Notícias</h1>
    <div>
    <a href="index.php" class="bg-indigo-400 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Inicio</a>
    <a href="adicionar_categoria.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Nova Categoria</a>
    <a href="adicionar.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Nova Notícia</a>
    </div>
  </header>

  <!-- Container principal -->
  <main class="max-w-4xl mx-auto mt-8 px-4">
    <!-- Listagem de notícias (home) -->

    <!-- Página: Adicionar Notícia -->
    <section class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Adicionar Nova Notícia</h2>
      <form action="../BACKEND/acoes.php" method="POST" class="space-y-4">
        <input type="hidden" name="data" value="<?= date('d/m/Y'); ?>">
        <div>
          <label class="block text-gray-700">Título</label>
          <input type="text" name="titulo" class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div>
          <label class="block text-gray-700">Resumo</label>
          <textarea name="resumo" class="w-full border border-gray-300 rounded p-2" required></textarea>
        </div>
        <div>
          <label class="block text-gray-700">Conteúdo</label>
          <textarea name="conteudo" rows="6" class="w-full border border-gray-300 rounded p-2" required></textarea>
        </div>
        <div>

          <label class="block text-gray-700">Categorias: </label>

            <div class="flex flex-col gap-4 ml-5 mt-3">
              <?php 
                $sql = "SELECT * FROM categoria_noticia";
                $dados = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($dados) > 0) {
                  foreach($dados as $categoria) {
                    $nome = $categoria['Categoria']; 
                    $sobre = $categoria['Sobre'];
                    $ID = $categoria['Categoria_ID'];
              ?>
                <div>
                  <label class="flex items-center space-x-2">
                    <input type="radio" name="categoria_id" value="<?= $ID ?>" class="border border-gray-300 rounded p-2">
                    <span class="text-gray-700 font-medium"><?= $nome ?></span>
                  </label>
                  <p class="text-gray-500 ml-6 text-sm"><?= $sobre ?></p>
                </div>
              <?php 
                  }
                }
              ?>
         </div>
        <button type="submit" class="mt-5 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition" name="adicionar_noticia">Salvar Notícia</button>
      </form>
    </section>



  <!-- Rodapé -->
  <footer class="bg-white mt-10 text-center text-gray-600 py-4 border-t">
    &copy; 2025 Portal de Notícias. Todos os direitos reservados.
  </footer>
</body>
</html>
