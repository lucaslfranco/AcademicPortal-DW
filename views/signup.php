<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/entry.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <a href="./index.html" class="logo">
                <i class="fas fa-graduation-cap fa-6x"></i>
                <h1>APortal</h1>
            </a>
            <form action="./index.php?new=true" method="post">
                <div class="card signup-card-position white-background dark-boxshadow">
                    <h3>Cadastrar Usuário</h3>
                    <p>Nome de Usuário</p>
                    <input name="username" type="text" placeholder="Entre com seu nome de usuário" required autofocus>
                    <p>Palavra-Passe</p>
                    <input name="password" type="password" placeholder="Entre com a palavra-passe" pattern=".{6,}" title="Escolha uma palavra-passe com no mínimo 6 caracteres." required>		
                    <p>Nome Completo</p>
                    <input name="name" type="text" placeholder="Entre com seu nome" pattern=".{3,}" required>
                    <p>E-mail</p>
                    <input name="email" type="email" placeholder="Entre com seu e-mail" required>		
                    <p>Ocupação</p>
                    <select name="role" id="role-select">
                        <option value="admin">Administrador</option>
                        <option value="student" selected="selected">Aluno</option>
                        <option value="teacher">Professor</option>
                    </select>
                    <input type="hidden" name="process" value="user/register">
                    <button type="submit">CADASTRAR</button>
                </div>
            </form>
            <!--<div class="signup-home-link">
                <a href="./index.html">Voltar para página inicial</a>		
            </div>-->
        </main>
    </body>
</html>