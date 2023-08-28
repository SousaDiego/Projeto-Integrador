<?php
     $disciplina   = $_POST['disciplina'];
     $idcurso      = $_POST['idcurso'];
     $cargaHoraria = $_POST['carga-horaria'];
     //para evitarmos o tipo de ataque de injeção de SQL
 
     $disciplina   = $conexao->escape_string($disciplina);
     $idcurso      =  $conexao->escape_string($idcurso);
     $cargaHoraria =  $conexao->escape_string($cargaHoraria);
 
     $sql = "INSERT INTO `disciplinas` (`id`, `nomeDisciplina`, `horasAula`, `cursos_idcursos`) VALUES (NULL, '$disciplina', '$cargaHoraria', '$idcurso');";
     $conexao->query($sql) or die($conexao->error);
 
     echo "<p class='p_rodape_form'>Mensagem enviada com sucesso.</p>";
?>