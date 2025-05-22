<?php 

    include 'conexao.php';

    if (isset($_POST['adicionar_noticia'])){

        $titulo = $_POST['titulo'];
        $resumo = $_POST['resumo'];
        $conteudo = $_POST['conteudo'];
        $categoria = $_POST['categoria_id'];
        $data = DateTime::createFromFormat('d/m/Y', $_POST['data'])->format('Y-m-d');

        $sql = "INSERT INTO tabela_noticias (Titulo, Resumo, Conteudo, Data ,Categoria_ID) VALUES ('$titulo', '$resumo','$conteudo', '$data' ,' $categoria ')";

        mysqli_query($conexao, $sql);

        header('location: ../FRONTEND/index.php');
        exit;

    }

    if (isset($_POST['adicionar_categoria'])) {
        $nome_categoria = $_POST['nome_categoria'];
        $sobre = $_POST['sobre'];
  
        $sql = "INSERT INTO categoria_noticia (Categoria, Sobre) VALUES ('$nome_categoria', '$sobre')";

        mysqli_query($conexao, $sql);
        header('location: ../FRONTEND/index.php');
        exit;
    }

    if (isset($_POST['excluir'])){
        $ID = $_POST['ID'];

        $sql = "DELETE FROM Tabela_Noticias WHERE ID = $ID";

        mysqli_query($conexao, $sql);
        header('location: ../FRONTEND/index.php');
        exit;


    }

    if (isset($_POST['editar'])){
        
        $ID = $_POST['ID_noticia'];
        $titulo = $_POST['titulo'];
        $resumo = $_POST['resumo'];
        $conteudo = $_POST['conteudo'];
        $categoria = $_POST['categoria_id'];

        $sql = "UPDATE tabela_noticias 
        SET Titulo='$titulo', Resumo='$resumo', Conteudo='$conteudo', Categoria_ID=$categoria WHERE id = $ID";

        mysqli_query($conexao, $sql);

        header('location: ../FRONTEND/index.php');
        exit;
    }