<?php
    //nesta include, adicionamos uma única linha de código que é responsável por estabelecer a ligação propriamente dita entre o PHP e o MySQL

    $conexao = new mysqli($servidor, $usuario, $senha) or exit($conexao->error); 
?>