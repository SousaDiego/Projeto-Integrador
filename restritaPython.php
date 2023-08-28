<?php
    session_start();

    if(isset($_SESSION["login"]) && is_array($_SESSION["login"])){
        require("acoes/conexao.php");

        $adm = $_SESSION["login"][1];
        $nome = $_SESSION["login"][0];
        $pagamento = $_SESSION["login"][2] ;
    }
    else{
        echo "<script>window.location = 'login.html'</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Curso python - <?php echo $nome;?></title>
    <link rel="stylesheet" href="css/restritaPython/body.css">
    <link rel="stylesheet" href="css/restritaPython/div.css">
    <link rel="stylesheet" href="css/restritaPython/h3.css">
    <link rel="stylesheet" href="css/restritaPython/img.css">
    <link rel="stylesheet" href="css/restritaPython/li.css">
    <link rel="stylesheet" href="css/restritaPython/p.css">
    <link rel="stylesheet" href="css/restritaPython/ul.css">
    <link rel="stylesheet" href="css/restritaPython/h1.css">
    <link rel="stylesheet" href="css/restritaPython/a.css">
    <link rel="stylesheet" href="css/restritaPython/h2.css">
</head>
<body>
    <div class="div_menu">
            <h3 class="h3_menu">WH Cursos </h3>
            <ul class="ul_menu">
                <a href="login.html"><li class="li_menu">Entrar/Cadastrar</li></a>
                <a href="acesso.php"><li class="li_menu">Aluno</li></a>
                <a href="cursos.html"><li class="li_menu">Cursos</li></a>
                <a href="index.html"><li class="li_menu">Home</li></a>
            </ul>
        </div>
    <?php if($pagamento == 3 || $pagamento == 4): ?>
        <h1 class="h1_aula">Aula 1 - Introdução ao Python e configurando o Ambiente</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
            <p class="p_voltar"><- Voltar</p>
            <a href="python2.php"> 
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                    <a href="restritaPython.php">
                        <li class="li_aulas">Aula 1 - Introdução ao Python e Configurando o Ambiente</li>
                    </a>
                    <a href="python2.php"> 
                        <li class="li_aulas">Aula 2 - Variáveis, tipo, entrada, saída e operadores matemáticos</li>
                    </a>
                    <a href="python3.php">
                        <li class="li_aulas">Aula 3 - Operadores lógicos e estruturas de decisões (IF e ELSE)</li>
                    </a>
                    <a href="python4.php">
                        <li class="li_aulas">Aula 4 - String e listas</li>
                    </a>
                    <a href="python5.php">
                        <li class="li_aulas">Aula 5 - Estruturas de laço (WHILE e FOR)</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                <img src="img\pexels-jaime-reimer-2662116.jpg" class="img_videos" alt="">
            </div>    
            <div style="float: left;width: 84%;background-color: white;margin-top: 10px;padding: 50px;box-shadow: 5px 5px 10px 1px;">
                <p>Links Importantes</p>
                <br>
                <a href="https://www.python.org/">Python Oficial</a><br>
                <a href="https://www.jetbrains.com/pycharm/">PyCharm</a><br>
                <a href="https://www.sublimetext.com/">Sublime</a><br>
                <a href="https://www.jetbrains.com/community/education/#students">Tutorial de licença para estudantes no PyCharm</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if($pagamento == 2): ?>
        
    <?php endif; ?>
    <?php if($pagamento == 1): ?>
        <h1 class="h1_aula">Aula 1 - Introdução ao Python e configurando o Ambiente</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
            <p class="p_voltar"><- Voltar</p>
             <a href="python2.php">
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                   <a href="restritaPython.php">
                        <li class="li_aulas">Aula 1 - Introdução ao Python e Configurando o Ambiente</li>
                    </a>
                    <a href="python2.php"> 
                        <li class="li_aulas">Aula 2 - Variáveis, tipo, entrada, saída e operadores matemáticos</li>
                    </a>
                    <a href="python3.php">
                        <li class="li_aulas">Aula 3 - Operadores lógicos e estruturas de decisões (IF e ELSE)</li>
                    </a>
                    <a href="python4.php">
                        <li class="li_aulas">Aula 4 - String e listas</li>
                    </a>
                    <a href="python5.php">
                        <li class="li_aulas">Aula 5 - Estruturas de laço (WHILE e FOR)</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                <img src="img\pexels-jaime-reimer-2662116.jpg" class="img_videos" alt="">
            </div>    
            <div style="float: left;width: 84%;background-color: white;margin-top: 10px;padding: 50px;box-shadow: 5px 5px 10px 1px;">
                <p>Links Importantes</p>
                <br>
                <a href="https://www.python.org/">Python Oficial</a><br>
                <a href="https://www.jetbrains.com/pycharm/">PyCharm</a><br>
                <a href="https://www.sublimetext.com/">Sublime</a><br>
                <a href="https://www.jetbrains.com/community/education/#students">Tutorial de licença para estudantes no PyCharm</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if($pagamento == 4): ?>
        <h1 class="h1_aula">Aula 1 - Introdução ao Python e configurando o Ambiente</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
            <p class="p_voltar"><- Voltar</p>
            <a href="python2.php">
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                    <a href="restritaPython.php">
                        <li class="li_aulas">Aula 1 - Introdução ao Python e Configurando o Ambiente</li>
                    </a>
                    <a href="python2.php"> 
                        <li class="li_aulas">Aula 2 - Variáveis, tipo, entrada, saída e operadores matemáticos</li>
                    </a>
                    <a href="python3.php">
                        <li class="li_aulas">Aula 3 - Operadores lógicos e estruturas de decisões (IF e ELSE)</li>
                    </a>
                    <a href="python4.php">
                        <li class="li_aulas">Aula 4 - String e listas</li>
                    </a>
                    <a href="python5.php">
                        <li class="li_aulas">Aula 5 - Estruturas de laço (WHILE e FOR)</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                <img src="img\pexels-jaime-reimer-2662116.jpg" class="img_videos" alt="">
            </div>    
            <div style="float: left;width: 84%;background-color: white;margin-top: 10px;padding: 50px;box-shadow: 5px 5px 10px 1px;">
                <p>Links Importantes</p>
                <br>
                <a href="https://www.python.org/">Python Oficial</a><br>
                <a href="https://www.jetbrains.com/pycharm/">PyCharm</a><br>
                <a href="https://www.sublimetext.com/">Sublime</a><br>
                <a href="https://www.jetbrains.com/community/education/#students">Tutorial de licença para estudantes no PyCharm</a>
            </div>
        </div>
    <?php endif; ?>
    <a href="acoes/logount.php">Sair</a>
</body>
</html>