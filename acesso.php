<?php
    session_start();

    if(isset($_SESSION["login"]) && is_array($_SESSION["login"])){
        require("acoes/conexao.php");
        
        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();

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
    <title>Acesso - <?php echo $nome;?></title>
    <link rel="stylesheet" href="css/acesso/master.css">
    <link rel="stylesheet" href="css/acesso/body.css">
    <link rel="stylesheet" href="css/acesso/div.css">
    <link rel="stylesheet" href="css/acesso/h3.css">
    <link rel="stylesheet" href="css/acesso/img.css">
    <link rel="stylesheet" href="css/acesso/li.css">
    <link rel="stylesheet" href="css/acesso/p.css">
    <link rel="stylesheet" href="css/acesso/ul.css">
    <link rel="stylesheet" href="css/acesso/menu.css">
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
    <?php if($adm == 1): ?>
        <!--<0div style="width: 100%">
        <table>
            <thead>
                <tr>
                    <td>email</td>
                    <td>senha</td>
                    <td>nome</td>
                    <td>nivel de Acesso</td>
                    <td>Id</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = $conexao->prepare("SELECT * FROM pessoa");
                    $query->execute();

                    $users = $query->fetchAll(PDO::FETCH_ASSOC);

                    for($i = 0; $i < sizeof($users); $i++):
                        $usuarioAtual = $users[$i];
                ?>
                <tr>
                    <td><?php echo $usuarioAtual["email"]; ?></td>
                    <td><?php echo $usuarioAtual["senha"]; ?></td>
                    <td><?php echo $usuarioAtual["nome"]; ?></td>
                    <td><?php echo $usuarioAtual["idadm"]; ?></td>
                    <td><?php echo $usuarioAtual["id"]; ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        </div>-->
        <div style="float: left; width: 30%;">
            <ul>
                <li class="topmenu"> Menu </li>
                <li class="menu" onclick="Mudarestado('adm')">Add adm</li>
                <li class="menu" onclick="Mudarestado('disciplina')">Add Disciplina</li>
                <li class="menu" onclick="Mudarestado('curso')">Add Curso</li>
                <li class="menu" onclick="Mudarestado('certificado')">Add certificado</li>
                <li class="menu" onclick="Mudarestado('pagamento')">Add Pagamento</li>
                <li class="menu" onclick="Mudarestado('editar_adm')">Editar adm do aluno</li>
                <li class="menu" onclick="Mudarestado('editar_curso')">Editar curso do aluno</li>
                <li class="menu" onclick="Mudarestado('editar_certificado')">Editar certificado do aluno</li>
                <li class="menu" onclick="Mudarestado('editar_pagamento')">Editar pagamento do aluno</li>
                <li class="menu" onclick="Mudarestado('tabular_todos')">Tabular todos aluno</li>
                <li class="menu" onclick="Mudarestado('tabular_id')">Tabular aluno por id</li>
                <li class="menu" onclick="Mudarestado('tabular_adm')">Tabular adm</li>
                <li class="menu" onclick="Mudarestado('tabular_disciplina')">Tabular Disciplina</li>
                <li class="menu" onclick="Mudarestado('tabular_curso')">Tabular Curso</li>
                <li class="menu" onclick="Mudarestado('tabular_certificado')">Tabular certificado</li>
                <li class="menu" onclick="Mudarestado('tabular_pagamento')">Tabular Pagamento</li>
            </ul>
        </div>
        <!--paginas de exibisão -->
        <div style="float: left; width: 70%;">
            <!--add adm -->
            <div id="adm" style="display: none;">
                <p>Add adm</p>
                
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> add adm  </legend>
                    <label class="alinha"> Nível de adm: </label>
                    <input type="text" name="adm"><br>
                    <button class="pronto" name="add_adm"> Add adm </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["add_adm"]))
                    {
                        require "includes/enviar/add_adm-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!--Add DISCIPLINA-->
            <div id="disciplina" style="display: none;">
                <p>Add disciplina</p>
            
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Disciplina: </label>
                    <input type="text" name="disciplina"> <br>
                    <label class="alinha"> Id curso: </label>
                    <input type="text" name="idcurso"><br>
                    <label class="alinha"> Carga Horária: </label>
                    <input type="text" name="carga-horaria"><br>
                    <button class="pronto" name="adicionar-disciplina"> Adicionar disciplina </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["adicionar-disciplina"]))
                    {
                        require "includes/enviar/add-disciplina.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>
            <div id="curso" style="display: none;">
            <!--Add CURSO-->

                <p>Add curso</p>

                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Curso: </label>
                    <input type="text" name="curso"> <br>
                    <label class="alinha"> Id disciplina: </label>
                    <input type="text" name="id-disciplina"><br>

                    <button class="pronto" name="adicionar-curso"> Adicionar curso </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["adicionar-curso"]))
                    {
                        require "includes/enviar/add-curso.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>

            <!--Add CERTIFICADO-->
            <div id="certificado" style="display: none;">
            
            <p>Add certificado</p>

            <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Disciplina: </label>
                    <input type="text" name="disciplina"> <br>
                   
                    <button class="pronto" name="adicionar-certificado"> Adicionar certificado </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["adicionar-certificado"]))
                    {
                        require "includes/enviar/add-certificado.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>     
        
            </div>
            <!--Add PAGAMENTO-->

            <div id="pagamento" style="display: none;">
            
            <p>Add pagamento</p>

            <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Curso: </label>
                    <input type="text" name="curso"> <br>
                    <label class="alinha"> Pagamnto: </label>
                    <input type="text" name="pagamento"> <br>
                   
                    <button class="pronto" name="adicionar-pagamento"> Adicionar pagamento </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["adicionar-pagamento"]))
                    {
                        require "includes/enviar/add-pagamento.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>     
        
            </div>
            <!--Editar adm do aluno -->
            <div id="editar_adm" style="display: none;">
                <p>Editar adm do aluno</p>
                
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Id: </label>
                    <input type="text" name="pesquisa-id"> <br>
                    <label class="alinha"> Id curso: </label>
                    <select name="operacao">
                        <option value="1">Adm</option>
                        <option value="2">Não adm</option>
                    </select><br>
                    <button class="pronto" name="editar_curso"> editar certificado por id </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["editar_curso"]))
                    {
                        require "includes/enviar/adm-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>
            <!--Editar curso do aluno -->
            <div id="editar_curso" style="display: none;">
                <p>Editar curso do aluno</p>
                
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Id: </label>
                    <input type="text" name="pesquisa-id"> <br>
                    <label class="alinha"> Id curso: </label>
                    <select name="operacao">
                        <option value="0">Não curso</option>
                        <option value="1">Segurança da informação</option>
                    </select><br>
                    <button class="pronto" name="editar_curso"> editar certificado por id </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["editar_curso"]))
                    {
                        require "includes/enviar/curso-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>
            <!--Editar certificado do aluno -->
            <div id="editar_certificado" style="display: none;">
                <p>Editar certificado do aluno</p>
                
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Id: </label>
                    <input type="text" name="pesquisa-id"> <br>
                    <label class="alinha"> Id certificado: </label>  
                    <select name="operacao">
                        <option value="1">Nenhuma diciplina</option>
                        <option value="2">Introdução ao pentest</option>
                        <option value="3">Python</option>
                        <option value="4">Introdução ao pentest e Python</option>
                    </select><br>
                    <button class="pronto" name="editar_certificado"> editar certificado por id </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["editar_certificado"]))
                    {
                        require "includes/enviar/certificado-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>
            <!--Editar pagamento do aluno -->
            <div id="editar_pagamento" style="display: none;">
                <p>Editar pagamento do aluno</p>
                
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Id: </label>
                    <input type="text" name="pesquisa-id"> <br>
                    <label class="alinha"> Id pagamento: </label>
                    <select name="operacao">
                        <option value="1">nenhuma disciplina</option>
                        <option value="2">Introdução ao pentest</option>
                        <option value="3">Python</option>
                        <option value="4">Introdução ao pentest e Python</option>
                    </select><br>
                    <button class="pronto" name="pesquisar"> editar pagamento por id </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["pesquisar"]))
                    {
                        require "includes/enviar/pagamento-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>            
            </div>
            <!--Tabular todos os alunos -->
            <div id="tabular_todos" style="display: none;">
                <p>tabular todos alunos</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!--Tabular alunos por id -->
            <div id="tabular_id" style="display: none;">
            
                <p>tabular por id</p>
            
                <form actinon="acesso.php" method="post">
                <fieldset>
                    <legend> Pesquisar - por id </legend>
                    <label class="alinha"> Id: </label>
                    <input type="text" name="id"> <br>
                    
                    <button class="pronto" name="pesquisar-id"> pesquisar por id </button>
                </fieldset>
                </form>
                <?php
                    require "includes/conectar/dados-conexao.inc.php";
                    require "includes/conectar/conectar.inc.php";    
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST["pesquisar-id"]))
                    {
                        require "includes/enviar/tabular-alunos-id.inc.php";
                    }
                    
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
           <!--tabular adm-->
            <div id="tabular_adm" style="display: none;">
                <p>tabular adm</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/tabular-adm.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados-adm.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!-- tabular disciplina-->
            <div id="tabular_disciplina" style="display: none;">
                <p>tabular Disciplina</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/tabular-disciplina.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados-disciplina.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!--Tabular curso -->
            <div id="tabular_curso" style="display: none;">
                <p>tabular Curso</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/tabular-cursos.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados-curso.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!--Tabular certificado -->
            <div id="tabular_certificado" style="display: none;">
                <p>tabular Certificado</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/tabular-certificado.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados-certificado.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
            <!--Tabular pagamento -->
            <div id="tabular_pagamento" style="display: none;">
                <p>tabular Pagamento</p>
            
                <form action="acesso.php" method="post">
                <button class="button_menu" name="tabular">Tabular todos alunos</button>
                </form> 
                <?php
                    require "includes/conectar/tabular-pagamento.inc.php";
                    require "includes/conectar/conectar.inc.php";
                    require "includes/conectar/abrir-banco.inc.php";
                    require "includes/conectar/definir-charset.inc.php";
                    
                    if(isset($_POST['tabular']))
                    {
                        require "includes/enviar/tabular-dados-pagamento.inc.php";
                    }
                    require "includes/desconectar/desconectar.inc.php";
                ?>
            </div>
        </div>
    <?php endif; ?>
    <!--Area de aluno-->
    <?php if($pagamento == 2): ?>
        <div class="div_cursos">
            <h3 class="h3_cursos">Cursos matriculados</h3>
            <a href="restritaIntroducao.php" style="text-decoration: none; color: black">
            <div class="div_curso_1">
        
                <img src="img/pexels-pixabay-60504.jpg" alt="imagem introducao ao hacking" class="img_1">
                <p class="p_curso_1">Introdução a hacking e pentest 2.0</p>
            </div>
        </a>
        </div>
    <?php endif; ?>
    <?php if($pagamento == 3): ?>
        <div class="div_cursos">
            <h3 class="h3_cursos">Cursos matriculados</h3>
            <a href="restritaPython.php" style="text-decoration: none; color: black">
            <div class="div_curso_2">
                <img src="img/pexels-jan-kopřiva-3280908.jpg" alt="imagem introducao ao python" class="img_2">
                <p class="p_curso_2">python basico</p>
            </div></a>
        </div>
    <?php endif; ?>
    <?php if($pagamento == 4 ): ?>
        <div class="div_cursos">
            <h3 class="h3_cursos">Cursos matriculados</h3>
            <a href="restritaIntroducao.php" style="text-decoration: none; color: black">
            <div class="div_curso_1">
                <img src="img/pexels-pixabay-60504.jpg" alt="imagem introducao ao hacking" class="img_1">
                <p class="p_curso_1">Introdução a hacking e pentest 2.0</p>
            </div>
            </a>
            <a href="restritaPython.php" style="text-decoration: none; color: black">
            <div class="div_curso_2">
                <img src="img/pexels-jan-kopřiva-3280908.jpg" alt="imagem introducao ao python" class="img_2">
                <p class="p_curso_2">python basico</p>
            </div></a>
        </div>
    <?php endif; ?>
    <a href="acoes/logount.php">Sair</a>
    <script src="js/close.js"></script>
</body>
</html>