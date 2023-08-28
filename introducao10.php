<?php
    session_start();

    if(isset($_SESSION["login"]) && is_array($_SESSION["login"])){
        require("acoes/conexao.php");

        $nivelDeAcesso = $_SESSION["login"][1];
        $nome = $_SESSION["login"][0];
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
    <?php if($nivelDeAcesso == 1): ?>
        <h1 class="h1_aula">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
            <a href="introducao9.php"> 
                <p class="p_voltar"><- Voltar</p>
            </a>
            <a href="introducao11.php"> 
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                   <a href="introducao10.php"> 
                        <li class="li_aulas">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</li>
                    </a>
                   <a href="introducao11.php"> 
                        <li class="li_aulas">Aula 11 - Post exploitation, Hashing e Criptografia</li>
                    </a>
                    <a href="introducao12.php"> 
                        <li class="li_aulas">Aula 12 - Linux Privilege escalation - Obtendo maiores privilégios</li>
                    </a>
                    <a href="introducao13.php"> 
                        <li class="li_aulas">Aula 13 - Pivoting - Comprometendo toda a rede</li>
                    </a>
                    <a href="introducao14.php"> 
                        <li class="li_aulas">Aula 14 - Elevando seu nível - Por diversão e lucro</li>
                    </a>
                    
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                <img src="img/imagem%20do%20pentest%20atualizada.jpg" class="img_videos" alt="">
            </div>    
        </div>
    <?php endif; ?>
    <?php if($nivelDeAcesso == 2): ?>
        <h1 class="h1_aula">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
           <a href="introducao9.php"> 
                <p class="p_voltar"><- Voltar</p>
            </a>
            <a href="introducao11.php"> 
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                  <a href="introducao10.php"> 
                        <li class="li_aulas">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</li>
                    </a>
                   <a href="introducao11.php"> 
                        <li class="li_aulas">Aula 11 - Post exploitation, Hashing e Criptografia</li>
                    </a>
                    <a href="introducao12.php"> 
                        <li class="li_aulas">Aula 12 - Linux Privilege escalation - Obtendo maiores privilégios</li>
                    </a>
                    <a href="introducao13.php"> 
                        <li class="li_aulas">Aula 13 - Pivoting - Comprometendo toda a rede</li>
                    </a>
                    <a href="introducao14.php"> 
                        <li class="li_aulas">Aula 14 - Elevando seu nível - Por diversão e lucro</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                 <img src="img/imagem%20do%20pentest%20atualizada.jpg" class="img_videos" alt="">
            </div>    
        </div>
    <?php endif; ?>
    <?php if($nivelDeAcesso == 3): ?>
        
    <?php endif; ?>
    <?php if($nivelDeAcesso == 4): ?>
        <h1 class="h1_aula">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</h1>
        <a class="a_aula" href="acesso.php">Voltar para cursos matriculado</a>
        <div class="div_tabela_aula">
           <a href="introducao9.php"> 
                <p class="p_voltar"><- Voltar</p>
            </a>
            <a href="introducao11.php"> 
                <p class="p_proximo">Próximo -></p>
            </a>
            <div style="background-color: white;float: left;margin: 10px;box-shadow: 5px 5px 10px 1px;">
                <p class="p_sesao">Sessão</p>
                <h2 class="h2_aulas">Aulas</h2>
                <ul>
                    <a href="introducao10.php"> 
                        <li class="li_aulas">Aula 10 - Shell Upload - Invadindo o servidor com Shell Reversa</li>
                    </a>
                   <a href="introducao11.php"> 
                        <li class="li_aulas">Aula 11 - Post exploitation, Hashing e Criptografia</li>
                    </a>
                    <a href="introducao12.php"> 
                        <li class="li_aulas">Aula 12 - Linux Privilege escalation - Obtendo maiores privilégios</li>
                    </a>
                    <a href="introducao13.php"> 
                        <li class="li_aulas">Aula 13 - Pivoting - Comprometendo toda a rede</li>
                    </a>
                    <a href="introducao14.php"> 
                        <li class="li_aulas">Aula 14 - Elevando seu nível - Por diversão e lucro</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="div_videos">
            <div style="background-color: white;float: left;width: 97%;box-shadow: 5px 5px 10px 1px;">
                 <img src="img/imagem%20do%20pentest%20atualizada.jpg" class="img_videos" alt="">
            </div>    
        </div>
    <?php endif; ?>
    <a href="acoes/logount.php">Sair</a>
</body>
</html>