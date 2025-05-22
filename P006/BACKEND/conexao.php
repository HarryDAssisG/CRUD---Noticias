<?php 

    $local = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco_dados = 'P006';

    $conexao = mysqli_connect($local, $usuario, $senha, $banco_dados);

    if (!$conexao){
        die ("Erro na conexao" . mysqli_connect_error(""));
    }
