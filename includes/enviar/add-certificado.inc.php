<?php
     $disciplina   = $_POST['disciplina'];
    
     //para evitarmos o tipo de ataque de injeção de SQL
 
     $disciplina   = $conexao->escape_string($disciplina);
     
 
     $sql = "INSERT INTO `certificado` (`idcertificado`, `diciplina`) VALUES (
             NULL, '$disciplina ')";

     $conexao->query($sql) or die($conexao->error);
 
     echo "<p class='p_rodape_form'>Mensagem enviada com sucesso.</p>";
?>