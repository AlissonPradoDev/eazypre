<?php
session_start();
require_once '../model/operadores_model_Crud.php';

if($_POST != null){

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


if (isset($_POST)) {
    $operador = new operadores();
    $operador->extras_select = "WHERE operador_cpf = ".$cpf." AND operador_senha = '".$senha."'";
    $operador->selecionaTudo($operador);
    $resoperador = $operador->retornadados();
    if ($resoperador != null) {
        $_SESSION['operadorId'] = $resoperador['idoperador'];
        if (isset($_SESSION['operadorId'])) {
            echo "<script>location.href='../pages/view_operacional_principal.php';</script>";
        } else {
            echo "<script>alert('Problema na sua senha ou login. Tente mais uma vez ou contacte o administrador.');</script>";
            echo "<script>location.href='https://netoncred.com.br/#a_plataforma';</script>";
        }
    } else {
        echo "<script>alert('Nâo Autorizado.');</script>";
        echo "<script>location.href='https://netoncred.com.br/#a_plataforma';</script>";
    }
} else {
    echo "<script>alert('Ouve um erro no envio do seu email! Por favor tentar logar novamente.');</script>";
    echo "<script>location.href='https://netoncred.com.br/#a_plataforma';</script>";
}
}else{
    echo "<script>alert('Formulário veio vazio";
}
?>