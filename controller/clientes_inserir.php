<?php

//INSERIR DADOS DO FORMULARIO - CLIENTE
require_once ('../model/contatos_model.php');

if(isset($_POST)){
$contatos = new contatos();

$contatos->setValor("ctt_pnome", ($_POST['ctt_pnome']));
$contatos->setValor("ctt_unome", ($_POST['ctt_unome']));
$contatos->setValor("ctt_email", ($_POST['ctt_email']));
$contatos->setValor("ctt_cpf", ($_POST['ctt_cpf']));
$contatos->setValor("ctt_mae", ($_POST['ctt_mae']));
$contatos->setValor("ctt_pai", ($_POST['ctt_pai']));
$contatos->setValor("ctt_dt_nasc", ($_POST['ctt_dt_nasc']));


$contatos->setValor("ctt_status", "Pre-Cadastro");
$contatos->inserir($contatos);

//enviaremailCadastroClt();
    echo '<script>alert("Inserido com Sucesso.");window.location="../lp_precadastro.php";</script>';
}
?>
