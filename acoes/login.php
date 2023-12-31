<?php
    require("conexao.php");
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("ConfigEmail.php");

    
    Class SendMail{   
        private $mail= null;
        
        public function settingsMail($usuarioEmail, $senhaEmail){
            $this->mail = new PHPMailer\PHPMailer\PHPMailer();
            $this->mail->isSMTP();

            $this->mail->Port="465";
            $this->mail->Host="smtp.gmail.com";
            $this->mail->IsHTML(true);
            $this->mail->SMTPSecure ="ssl";
            $this->mail->Mailer="smtp";
            $this->mail->CharSet="UTF-8";

            $this->mail->SMTPAuth=true;
            $this->mail->Username= $usuarioEmail;
            $this->mail->Password= $senhaEmail;

            $this->mail->SingleTo= true;

            $this->mail->From= $usuarioEmail;
            $this->mail->FromName= "Escola WH Cursos";    
        }
        
        public function sendMailCadastro($nome, $email, $token){
            $file = file_get_contents("templates/cadastro.html");
            $file = str_replace("[NOME_USUARIO]", $nome, $file);
            $file = str_replace("[TOKEN]", $token, $file);
            
            $this->mail->addAddress($email);
            $this->mail->Subject="Confirmação do endereço de email";
            $this->mail->Body= $file;

            if(!$this->mail->send()){
                return false;
            }
            
            return true;
        }
        
        public function sendMailEsqueci($nome, $email, $token){
            $file = file_get_contents("templates/esqueci.html");
            $file = str_replace("[NOME_USUARIO]", $nome, $file);
            $file = str_replace("[TOKEN]", $token, $file);
            
            $this->mail->addAddress($email);
            $this->mail->Subject="Mudança de senha";
            $this->mail->Body= $file;

            if(!$this->mail->send()){
                return false;
            }
            
            return true;
        }
        
        
    };

    Class LoginAndCadastro extends SendMail{
        private $con = null;
        
        public function __construct($conexao, $usuarioEmail, $senhaEmail){
            $this->con = $conexao;
            $this->settingsMail($usuarioEmail, $senhaEmail);
        }
        
        public function send(){
            if(empty($_POST) || $this->con == null){
                echo json_encode(array("erro" =>1, "mensagem" => "Ocorreu um erro interno no servidor"));
                return;
            }
            
            switch(true){
                case (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST["email"]) && isset($_POST["senha"])):
                    echo $this->login($_POST["email"], $_POST["senha"]);
                    break;
                
                case (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["nome"])):
                    echo $this->cadastro($_POST["email"], $_POST["senha"], $_POST["nome"]);
                    break;
                
                case (isset($_POST["type"]) && $_POST["type"] == "esqueci" && isset($_POST["email"])):
                    echo $this->esqueciSenha($_POST["email"]);
                    break;
            }
        }
        
        public function esqueciSenha($email){
            $conexao = $this->con;
            
            $query = $conexao->prepare("SELECT email, nome, token FROM pessoa WHERE email = ?");
            $query->execute(array($email));

            if($query->rowCount() ) {
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
                
                if($this->sendMailEsqueci($user["nome"], $user["email"], $user["token"])){
                    return json_encode(array("erro" => 2, "mensagem" => "Olá {$user['nome']}, por favor verifique seu email."));    
                }
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Email não encontrado."));
            }
        }
        
        public function login($email, $senha){
            $conexao = $this->con;
            
            $query = $conexao->prepare("SELECT * FROM pessoa WHERE email = ?");
            $query->execute(array($email));

            if($query->rowCount() ) {
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
                
                if($user["senha"]==$senha && $user["confirmado"]){
                    session_start();
                    $_SESSION["login"] = array($user["nome"], $user["idadm"], $user["idpagamento"]);    
                    return json_encode(array("erro" => 0));
                }
                if($user["senha"]==$senha && !$user["confirmado"]){
                    return json_encode(array("erro" => 2, "mensagem"=> "Olá{$user['nome']}, Por favor, ative sua conta!"));
                }
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "E-mail e/ou senha incorretos!"));
            }
        }
        
        public function cadastro($email, $senha,$nome){
            $conexao= $this->con;
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
            
            $token = $geraToken();
              
            $query = $conexao->prepare("INSERT INTO pessoa (email, senha, nome, idadm, idpagamento, idcertificado, idcurso, confirmado, token) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
            
            if($query->execute(array($email, $senha, $nome, 2, 1, 1, 1, 0, $token))){    
                if($this->sendMailCadastro($nome, $email, $token)){
                    return json_encode(array("erro" => 2));    
                }
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro ao cadastrar usuario!"));
            }
        }
    };

    $conexao= new Conexao();
    $classe = new LoginAndCadastro($conexao->conectar(), $usuarioEmail, $senhaEmail);
    $classe->send();
    