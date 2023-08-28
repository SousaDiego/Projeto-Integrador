<?php
    $sql = "SELECT * FROM $nomeDaTabela WHERE 1 ";

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

        echo "<table>
                <caption>Mensagens enviadas</caption>
                    <tr>
                        <th>idcurso</th>
                        <th>Nome do curso</th>
                        <th>id disciplina</th>
                        
                    </tr>";

        // AVISO: sempre que usamos uma consulta select, h´a possibilidades  de dispararmos um tipo de ataque conhecido como XSS. Para que impeçamos este problema, devemos usar o comando em PHP, listado abaixo


        
        while($vetorRegistro = $resultado->fetch_array())
        {
            $email = $vetorRegistro[0];
            $senha = $vetorRegistro[1];
            $nome = $vetorRegistro[2];
           
            

            $email = htmlentities($email, ENT_QUOTES, "UTF-8");
            $senha = htmlentities($senha, ENT_QUOTES, "UTF-8");
            $nome = htmlentities($nome, ENT_QUOTES, "UTF-8");
            
            

          
            echo" <tr>
                    <td>$email</td>
                    <td>$senha</td>
                    <td>$nome</td>
                    
                    
                    
                    
                </tr>";
        }
        echo "</table>";
    }
?>