<?php include '../BACKEND/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Notícias</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
   <!-- Página: Visualizar Notícia -->
    <section class="bg-white rounded-xl shadow p-6 mb-6">
      <?php 
      
        $pegarID = $_GET['ID'];

        $sql = "SELECT * FROM tabela_noticias as n  LEFT JOIN categoria_noticia as c ON n.Categoria_ID = c.Categoria_ID WHERE ID = $pegarID";

        $dados_liquido = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
          $titulo = $dados_liquido['Titulo']; 
          $data = $dados_liquido['Data'];
          $conteudo = $dados_liquido['Conteudo'];
          $categoria = $dados_liquido['Categoria']

      ?>
      <h2 class="text-3xl font-bold text-gray-800 mb-2"><?= $titulo ?></h2>
      <p class="text-sm text-gray-500 mb-4"><?= $data ?></p>
      <p class="text-gray-700 leading-relaxed">
          <?= $conteudo?>
      </p>
      <p class="mt-2">Categoria: <?= $categoria ?></p>
    </section>
  </main>

  <!-- Rodapé -->
  <footer class="bg-white mt-10 text-center text-gray-600 py-4 border-t">
    &copy; 2025 Portal de Notícias. Todos os direitos reservados.
  </footer>
</body>
</html>
