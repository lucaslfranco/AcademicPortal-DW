<?php
    require_once '../controller/userController.php';

    userController::login();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/entry.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <form action="./login.php" method="post">
                <div class="card login-card-position white-background dark-boxshadow">
                    <h3>Portal Acadêmico</h3>
                    <p>Nome de Usuário</p>
                    <input name="username" type="text" placeholder="Nome de usuário ou código" required autofocus>
                    <p>Palavra-Passe</p>
                    <input name="password" type="password" placeholder="Palavra-passe" required>		
                    <button type="submit">ENTRAR</button>
                </div>
            </form>
        </main>
        <div class="login-home-link">
            <a href="./index.html">Voltar para página inicial</a>		
        </div>
    </body>
</html>
