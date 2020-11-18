<?php
//Dados recebidos em Session da tela index
//if(isset($_POST)){
//  $email = $_POST['email'];
//  $cpf = $_POST['cpf'];
//}


?>

<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema de validação com APIs - Externas 
              ">
        <meta name="author" content="Alisson Prado">
        <meta name="generator" content="Jekyll v4.1.1">
        <title>Sistema de Login - Digital Eazy</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">
        <!-- Bootstrap core CSS -->
        <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="assets/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="assets/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

        <!-- Processo DataPicker - ToDo com Alisson Prado -->
        <link id="bsdp-css" href="alisson/css/form_validacao.css" rel="stylesheet">
        <script src="alisson/js/form_validacao.js" charset="UTF-8"></script>

        <link id="bsdp-css" href="alisson/css/bootstrap-datepicker3.min.css" rel="stylesheet">
        <script src="alisson/js/locales/bootstrap-datepicker.pt-BR.js" charset="UTF-8"></script>

        <script>$('#sandbox-container input').datepicker({
            });
        </script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="alisson/css/form_validacao.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="/__/firebase/8.0.2/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
             https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="/__/firebase/8.0.2/firebase-analytics.js"></script>

        <!-- Initialize Firebase -->
        <script src="/__/firebase/init.js"></script>
        
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="img/area_admin.png" alt="" >
                <h2>Formulário de Confirmação</h2>
                <p class="lead">Estamos trazendo seus dados de uma plataforma confiável e segura e precisamso para que o processo se concretize que verifique e valide os dados.</p>
            </div>

            <div class="row">

                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3">Dados cadastrais</h4>
                    <form class="needs-validation" method="POST" action="controller/clientes_inserir.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="primeiroNome">Primeiro Nome</label>
                                <input type="text" name="ctt_pnome" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Campo obrigatório
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ultimoNome">Último Nome</label>
                                <input type="text" name="ctt_unome" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Campo obrigatório
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <div class="input-group">

                                    <input type="text" name="ctt_email" class="form-control" id="username" placeholder="Email" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Email obrigatório
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cpf">CPF - (Digite APENAS NÚMEROS)</label>
                                <input type="text" name="ctt_cpf" class="form-control" id="address" placeholder="123.456.789-00" required>
                                <div class="invalid-feedback">
                                    Por favor entre com seu CPF
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="cpf">Nome da Mãe</label>
                                <input type="text" name="ctt_mae"  class="form-control" id="address" placeholder="Nome da Mãe" required>
                                <div class="invalid-feedback">
                                    Por favor entre com nome da Mãe Completo
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="cpf">Nome do Pai</label>
                                <input type="text" name="ctt_pai" class="form-control" id="address" placeholder="Nome do Pai" required>
                                <div class="invalid-feedback">
                                    Por favor entre com nome do Pai Completo
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="dtnasc">Data de Nascimento</label>
                                <input type="text" name="ctt_dt_nasc" class="form-control" id="datapicker" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor entre com Data de Nascimento
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn  btn-lg btn-block" type="submit" style="background-color: #000; color: #fff;">Continuar Checkin</button>
                       
                    </form>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2020- Digital Eazy</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" style="color: #000;">Privacidade</a></li>
                    <li class="list-inline-item"><a href="#" style="color: #000;">Termos</a></li>
                    <li class="list-inline-item"><a href="#" style="color: #000;">Ajuda</a></li>
                </ul>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
</html>
