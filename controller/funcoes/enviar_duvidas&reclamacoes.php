<?php

// multiple recipients
$to = 'atendimento@netoncred.com.br' ;

$nome = $_POST['cliente_nome'];
$cpf = $_POST['cliente_cpf'];
$tel = $_POST['cliente_tel1'];
$email = $_POST['cliente_email'];
$assunto = $_POST['cliente_assunto'];

// subject
$subject = 'Dúvidas e Reclamações - Net On Cred';

// message
$message .= "'A Net On Cred recebeu mensagem de:'";
$message .= " $nome; <br/>";
$message .= "'CPF:' $cpf; <br/>";
$message .= "'E-mail:' $email; <br/>";
$message .= "'Telefone:' $tel; <br/>";
$message .= "'Assunto:' $assunto; <br/>";



// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'To: Suporte Net On Cred <suporte@netoncred.com.br>' . "\r\n";



// Mail it

 if (mail($to, $subject, $message, $headers)){
        echo "<script>alert('Email enviado com sucesso!');</script>";
        echo "<script>location.href='https://netoncred.com.br/#a_plataforma';</script>";
 }else{
 echo "<script>alert('Ouve um erro no envio do seu email! Por favor envie-o novamente.');</script>";}s
?>