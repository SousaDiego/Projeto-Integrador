<?php
     $adm = $_POST['adm'];
     
 
     //para evitarmos o tipo de ataque de injeção de SQL
 
     $adm = $conexao->escape_string($adm);
     
 
     $sql = "INSERT INTO `adm` (`idadm`, `adm`) VALUES (NULL, '$adm');";
     $conexao->query($sql) or die($conexao->error);
 
     echo "<p class='p_rodape_form'>Mensagem enviada com sucesso.</p>";
?>