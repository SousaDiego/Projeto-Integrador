$(function(){
    $("button#btnEsqueci").on("click",function(e){
       e.preventDefault(); 
        var campoEmail = $("form#formularioEsqueci #email").val();
        if(campoEmail.trim() == ""){
           $("div#mensagem").html("Preencha o seu email.");
       }else{
        $.ajax({
           url: "acoes/login.php",
           type: "POST",
           data: {
               type:"esqueci",
                email: campoEmail
           },

           success: function(retorno){
               console.log(retorno);
               retorno = JSON.parse(retorno);

               if(retorno["erro"] == 1){
                   $("div#mensagem").html(retorno["mensagem"]);
               }else if(retorno["erro"] == 2){
                   $("div#mensagem").html(retorno["mensagem"]);
               }
           },

           error: function(){
               $("div#mensagem").html("Ocorreu um erro durante a solicitação");
           }
        });
       }
    });
    $("button#btnEntrar").on("click", function(e){
      e.preventDefault();
       
       var campoEmail = $("form#formularioLogin #email").val();
       var campoSenha = $("form#formularioLogin #senha").val();
       
       if(campoEmail.trim() == "" || campoSenha.trim() == ""){
           $("div#mensagem").html("Preencha todos os campos.");
       }else{
           $.ajax({
               url: "acoes/login.php",
               type: "POST",
               data: {
                   type:"login",
                    email: campoEmail,
                    senha: campoSenha
               },
               
               success: function(retorno){
                   console.log(retorno);
                   retorno = JSON.parse(retorno);
                   
                   if(retorno["erro"] == 1){
                       $("div#mensagem").html(retorno["mensagem"]);
                   }else if(retorno["erro"] == 2){
                       $("div#mensagem").html(retorno["mensagem"]);
                   }else{
                       window.location = "acesso.php";
                   }
               },
               
               error: function(){
                   $("div#mensagem").html("Ocorreu um erro durante a solicitação");
               }
           });
       }
   }); 
    
    $("button#btnCadastrar").on("click", function(e){
      e.preventDefault();
       
       var campoNome = $("form#formularioCadastro #nome").val();
        var campoEmail = $("form#formularioCadastro #email").val();
       var campoSenha = $("form#formularioCadastro #senha").val();
        
       
       if(campoNome.trim() == "" || campoEmail.trim() == "" || campoSenha.trim() == ""){
           $("div#mensagem").html("Preencha todos os campos do cadastro.");
       }else{
           $.ajax({
               url: "acoes/login.php",
               type: "POST",
               data: {
                    type:"cadastro",
                    nome: campoNome,
                    email: campoEmail,
                    senha: campoSenha
                   
               },
               
               success: function(retorna){
                   console.log(retorna);
                   retorno = JSON.parse(retorna);
                   
                   if(retorno["erro"] == 1){
                       $("div#mensagem").html(retorno["mensagem"]);
                   }else if(retorno["erro"] == 2){
                       $("div#mensagem").html("Enviamos um email de confirmação para "+campoEmail+"");
                   }else{
                       window.location = "login.html";
                   }
                                   
               },
               
               error: function(){
                   $("div#mensagem").html("Ocorreu um erro durante a solicitação");
               }
           });
       }
   }); 
});