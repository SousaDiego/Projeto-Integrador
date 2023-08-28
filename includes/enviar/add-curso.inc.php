<?php
     $nomeCurso    = $_POST['curso'];
     $idDisciplina = $_POST['id-disciplina'];
     
     //para evitarmos o tipo de ataque de injeção de SQL
 
     $nomeCurso      = $conexao->escape_string($nomeCurso);
     $idDisciplina   = $conexao->escape_string($idDisciplina);
     
 
     $sql = "INSERT INTO `cursos` (`idcursos`, `nomeCurso`, `id_diciplina`) VALUES (
             NULL, '$nomeCurso ', '$idDisciplina')";
 
     echo "<p class='p_rodape_form'>Mensagem enviada com sucesso.</p>";
?>