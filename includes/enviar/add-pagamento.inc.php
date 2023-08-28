<?php
     
     $curso      = $_POST['curso'];
     $pagamento  = $_POST['pagamento'];
     //para evitarmos o tipo de ataque de injeção de SQL
 
     $curso     =  $conexao->escape_string($curso);
     $pagamento =  $conexao->escape_string($pagamento);
 
     $sql = "INSERT INTO `pagamentos` (`idcursosPagos`, `curso`, `pagamento`) VALUES (
             NULL, '$curso', '$pagamento');";
     $conexao->query($sql) or die($conexao->error);
 
     echo "<p class='p_rodape_form'>Mensagem enviada com sucesso.</p>";
?>