<?php
    $id    = trim($conexao->escape_string($_POST['pesquisa-id']));
    $idpagamento = trim($conexao->escape_string($_POST['operacao']));
    
    $sql = "UPDATE pessoa SET idpagamento='$idpagamento' WHERE id='$id' ";

    $resultado = $conexao->query($sql) or die($conexao->error);

    //sempre que formos tabular dados no formulario, antes, devemos solicitar para o PHP que nos diga quantos registros retornaram da consulta acima. Se não voltou, do banco, nenhum registro, enviamos uma mensagem apropriada ao cliente da aplicação. Se a consulta retornou, no mínimo, um registro, criamos o cabeçalho e o corpo da tabela normalmente.
    $quantosRegistros = $conexao->affected_rows;

    if($quantosRegistros == 0)
    {
        //não há nenhum produto perecível cadastrado no banco de dados
        echo"<p>Caro usuario nenhuma mensagem encontrada no banco de dados: </p>";
    }
    else
    {
        //desenhado o cabeçalho da tabela na pagina web

        echo "Nivel de acesso editado com sucesso!";

   
       
    }
?>