<?php

//multiple recipients
$to = 'suporte@netoncred.com.br' ;
$to = 'alisson.prado@agenciaantares.com' ;

if(isset($_POST)){
    
$nome = $_POST['cliente_nome'];
$apelido = $_POST['cliente_apelido'];
$genero = $_POST['genero'];
$cpf = $_POST['cliente_cpf'];
$tel = $_POST['cliente_tel1'];
$email = $_POST['cliente_email'];
$senha = $_POST['cliente_senha'];

// subject
$subject = 'Cadastro do site Net On Cred';

// message
$message .= "'A NetOnCred recebeu mensagem de:'";
$message .= " $nome; <br/>";
$message .= "'Gostaria de ser chamado de:' $apelido; <br/>";
$message .= "'Genero:' $genero; <br/>";
$message .= "'CPF:' $cpf; <br/>";
$message .= "'E-mail:' $email; <br/>";
$message .= "'Telefone:' $tel; <br/>";
$message .= "Parabéns Sr(a),". $nome . ", seu cadastro simples foi efetivado com sucesso.
            Agora você porderá contar com a Net On Cred para obter crédito 100% online 
            rápido e seguro";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'To: Suporte Net On Cred <suporte@netoncred.com.br>' . "\r\n";



// Mail it

 if (mail($to, $subject, $message, $headers)){
        echo "<script>alert('Email enviado com sucesso! Confire sua caixa de email');</script>";
        echo "<script>location.href='https://netoncred.com.br/#a_plataforma';</script>";
 }else{
 echo "<script>alert('Ouve um erro no envio do seu email! Por favor envie-o novamente.');</script>";}
 
}
?>