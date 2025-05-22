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
    <!-- Card de notícia -->
      <?php 
                $sql = "SELECT * FROM tabela_noticias as n LEFT JOIN categoria_noticia as c ON n.Categoria_ID = c.Categoria_ID";
                $dados = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($dados) > 0) {
                  foreach($dados as $noticia) {
                    $ID = $noticia['ID'];
                    $titulo = $noticia['Titulo']; 
                    $data = $noticia['Data'];
                    $resumo = $noticia['Resumo'];
                    $categoria = $noticia['Categoria'];
                    

        ?>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-xl font-semibold text-gray-800"><?= $titulo?></h2>
      <p class="text-sm text-gray-500 mb-2"><?= $data?></p>
      <p class="text-gray-700"><?= $resumo?></p>
      <p class="text-gray-700">Categoria: <?= $categoria?></p>
      <div class="mt-4 flex gap-2">
        <form action="../BACKEND/acoes.php?ID=" method="post">
          <a href="../FRONTEND/visualizar.php?ID=<?= $ID?>" class="text-blue-600 hover:underline">Ler mais</a>
          <a href="../FRONTEND/editar.php?ID=<?= $ID?>" class="text-yellow-500 hover:underline">Editar</a>
          <input type="hidden" name="ID" value="<?= $ID?>">
          <button type="submit" class="text-red-500 hover:underline"  name="excluir">Excluir</button>
        </form>
      </div>
    </div>
    <?php }} ?>


  </main>

  <!-- Rodapé -->
  <footer class="bg-white mt-10 text-center text-gray-600 py-4 border-t">
    &copy; 2025 Portal de Notícias. Todos os direitos reservados.
  </footer>
</body>
</html>
