<?php

//Verifica se as caixas de entrada tem valores.
if(isset($_POST['subUser']) &&
isset($_POST['message']) &&
isset($_POST['name']) &&
isset($_POST['email']) &&

//Verifica se as caixas de entrada tem valores nulos.
!empty($_POST['subUser']) &&
!empty($_POST['message']) &&
!empty($_POST['name']) &&
!empty($_POST['email']) &&
){

    //Adiciona valores a variáveis criadas com dados do formulário.
    $assunto = addslashes($_POST['subUser'])
    $mensagem = addslashes($_POST['message'])
    $nome = addslashes($_POST['name'])
    $enderecoEmail = addslashes($_POST['emailF'])

    //Adiciona um destino a mensagem.
    $to = "setorpalotina@ufpr.br";

    //Adiciona um assunto contendo a tag [FORMULÁRIO] para informar ao destinatário o modo de envio. 
    $subject = "[FORMULÁRIO] ".$assunto;

    //Adiciona um corpo a mensagem, sendo:
    //  De: NomeExemplo (emailUsuario@exemplo)
    //  Mensagem: O texto...
    $body = "De: ".$nome." (".$email.")\r\n"
            "Mensagem: ".$mensagem. "\r\n";

    //Adiciona o cabeçalho a mensagem, sendo
    //  From: emailDominioExemplo@servidor
    //  Reply-To: emailUsuario@exemplo         
    $header =   "From: emailDominioExemplo@servidor"."\r\n".
                "Reply-To: ".$email. "\r\n".
                //Mostra a versão do X=Mailer que está sendo executada.
                "X=Mailer:PHP/".phpversion();

    //A função é executada.
    if(mail($to,$subject,$body,$header)){

        //Caso a mensagem for enviada (retorna 'TRUE') mostra mensagem ao usuário.
        echo "<script>alert('Email enviado com Sucesso.');</script>";
    }else{
        //Caso a mensagem NÃO for enviada (retorna 'FALSE') mostra mensagem ao usuário.
        echo "<script>alert('O Email não pode ser enviado.');</script>";
    }
//Senão:
}else{
    //Caso a as caixas de entrada não estivever completas mostra mensagem ao usuário.
    echo "<script>alert('Todas as caixas de entrada devem estar com dados.');</script>";
}
?>