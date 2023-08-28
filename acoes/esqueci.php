
<html>
<head> 
    <meta charset="UTF-8">
    <title>Redefinir senha</title>
    <link rel="stylesheet" href="../css/index/body.css">
    <link rel="stylesheet" href="../css/index/div.css">
    <link rel="stylesheet" href="../css/index/h3.css">
    <link rel="stylesheet" href="../css/index/li.css">
    <link rel="stylesheet" href="../css/index/ul.css">
    <link rel="stylesheet" href="../css/index/h2.css">
    <link rel="stylesheet" href="../css/index/img.css">
    <link rel="stylesheet" href="../css/index/rodape/index.css">
    </head>
    <body>
        <div class="div_menu">
            <h3 class="h3_menu">WH Cursos </h3>
            <ul class="ul_menu">
                <a href="../login.html"><li class="li_menu">Entrar/Cadastrar</li></a>
                <a href="../acesso.php"><li class="li_menu">Aluno</li></a>
                <a href="../cursos.html"><li class="li_menu">Cursos</li></a>
                <a href="../index.html"><li class="li_menu">Home</li></a>
            </ul>
        </div>
        <?php
    require("conexao.php");

    $conexaoClasse = new Conexao();
    $conexao = $conexaoClasse->conectar();

    if(isset ($_GET["t"]) && isset($_POST["senha"])){
       
        $geraToken= function() use(&$geraToken, $conexao){
        $length = 16;
        $a = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
        $b = array();

        for($i = 0; $i < $length; $i++){
            $r= rand(0, (sizeof($a) - 1));
            $b[$i] = $a[$r];
        }
        $token = join("", $b);

        $query = $conexao->prepare("SELECT token FROM pessoa WHERE token = ?");
        $query->execute(array($token));

        if($query->rowCount() > 0){
            return $geraToken();
        }else{
            return $token;
        }
    };

        $newToken = $geraToken();
        try{
            $query = $conexao->prepare("UPDATE pessoa SET senha = ?, token=? WHERE token = ?");
            $query->execute(array($_POST["senha"], $newToken, $_GET["t"]));

            echo "Sua senha foi atualizada!";    
        }catch(PDOException $erro){
            echo "Erro";
        }    
             
       
    }
?>
<form action="#" method="post">
    <p> Digite a nova senha: </p>
    <input type="password" name="senha"/>
    <input type="submit" value="enviar"/>
    
</form>
</body>
</html>