<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Seja bem vindo a Digital Eazy. Sistema logável para clientes cadastrados.">
        <meta name="author" content="Alisson Prado">
        <meta name="generator" content="Jekyll v4.1.1">
        <title>Sistema de Login - Digital Eazy</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <link href="alisson/css/logar.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" action="termos.php" method="POST" >
            <img class="mb-8" src="img/area_admin.png" alt="" style="padding: 10px">
            <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <div style="clear: both; padding: 5px;"> </div>
            <label for="inputPassword" class="sr-only">CPF</label>
            <input type="type" id="inputPassword" name="cpf" class="form-control" placeholder="CPF" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #000;">Cadastrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
        </form>
    </body>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyB0s4THRzhfs4gm3oqMUGxUQr87R4kj7ns",
            authDomain: "precadastrodz.firebaseapp.com",
            databaseURL: "https://precadastrodz.firebaseio.com",
            projectId: "precadastrodz",
            storageBucket: "precadastrodz.appspot.com",
            messagingSenderId: "694982354600",
            appId: "1:694982354600:web:4ba25a4b14f62899fe049d"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
</html>
