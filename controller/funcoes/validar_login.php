<?php
session_start();
require_once '../model/cliente_model_Crud.php';
require_once '../model/operadores_model_Crud.php';

if($_POST != null){

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
//var_dump($_POST);

if (isset($_POST)) {
    $clientes = new cliente();
    $clientes->extras_select = "WHERE cliente_cpf = ".$cpf." AND cliente_senha = '".$senha."'";
    $clientes->selecionaTudo($clientes);
    $resclientes = $clientes->retornadados();
    if ($resclientes != null) {
        $_SESSION['usuarioId'] = $resclientes['idcliente'];
        if (isset($_SESSION['usuarioId'])) {
            echo "<script>location.href='../pages/view_cliente.php';</script>";
        } else {
            echo "<script>alert('Problema na sua senha ou login. Faça seu cadastro ou entre em contato.');</script>";
            echo "<script>location.href='https://netoncred.com.br/';</script>";
        }
    } else {
        echo "<script>alert('Por favor cadastre antes de logar.');</script>";
        echo "<script>location.href='https://netoncred.com.br/';</script>";
    }
} else {
    echo "<script>alert('Ouve um erro no envio do seu email! Por favor tentar logar novamente.');</script>";
    echo "<script>location.href='https://netoncred.com.br/';</script>";
}
}else{
    echo "<script>alert('Formulário veio vazio');</script>";
}
?>