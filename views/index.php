<?php
    require_once '../controller/mainController.php';
    
    mainController::process();

    session_start();

    $objects = mainController::initialize();
    $user = $objects[0];
    $role = $objects[1];
    $courses = $objects[2];
    $messages = $objects[3];
    unset($objects);  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Academic Portal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS-->
        <link rel="stylesheet" href="../css/customSwal.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/modal.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/tables.css">
        <!--Fontes-->
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto|Lato" rel="stylesheet">
        <!--Icones-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
    </head>
    <body>
        <header class="dark-purple-background dark-boxshadow">
            <a href="./index.php">
                <h2 id="logo">APortal</h2>
            </a>

            <h1 id="topnav-title">
                <?php
                switch ($role) {
                    case 'admin':
                        echo 'Área do Administrador';
                        break;
                    case 'student':
                        echo 'Portal do Aluno';
                        break;
                    case 'teacher':
                        echo 'Portal do Professor';
                        break;
                }
                ?>
            </h1>
            <div id="config-options">
                <div class="options-tooltip">
                    <a href="./index.php?page=user/profile">Perfil</a>
                    <a href="../controller/logoutController.php">Logout</a>
                </div>
                <i class="fas fa-user-circle fa-2x"></i>
            </div>
        </header>

        <main class="white-background">
            <nav id="compact-sidenav" class="dark-gray-background dark-boxshadow">
                <a onclick="toogleSidenav()">
                    <i class="fas fa-bars fa-lg"></i>
                </a>
            </nav>
            <nav id="sidenav" class="dark-gray-background dark-boxshadow">
                <a href="./index.php">
                    <h3 class="sidenav-section">Home</h3>
                </a>
                <?php
                switch ($role){
                    case 'admin':
                        echo '
                            <a href="#register">
                                <h3 class="sidenav-section">Cadastro</h3>
                            </a>
                            <div id="register" class="sidenav-options">
                                <a href="?page=user/register">Alunos / Professores</a>
                                <a href="?page=programme/register">Cursos / Disciplinas</a>
                            </div>
                            <a href="#search">
                                <h3 class="sidenav-section">Consulta</h3>
                            </a>
                            <div id="search" class="sidenav-options">
                                <a href="?page=programme/programmesView">Cursos</a>
                                <a href="?page=course/coursesView">Disciplinas</a>
                                <a href="?page=message/messagesView">Mensagens</a>
                                <a href="?page=user/usersView">Usuários</a>
                            </div>
                            <a href="?page=enrollment/register">
                                <h3 class="sidenav-section">Matrícula</h3>
                            </a>
                        ';
                        break;
                    default:
                        echo '
                            <a href="#courses">
                                <h3 class="sidenav-section">Disciplinas</h3>
                            </a>
                            <div id="courses" class="sidenav-options"">
                        ';
                                foreach ($courses as $course){
                                    echo '<a href="?page=course/view&course='.$course->getId().'">'.$course->getName().'</a>';
                                }
                        echo '
                            </div>
                            <a href="#support">
                                <h3 class="sidenav-section">Suporte</h3>
                            </a>  
                            <div id="support" class="sidenav-options">
                                <a href="#">Contato</a>
                                <a href="#">Suporte Online</a>
                            </div>	
                        ';
                        break;
                }
                ?>
            </nav>
            <div class="main-section">
                <?php
                // Checks if there is any extra path in url
                $page = filter_input(INPUT_GET, 'page');

                if (isset($page)) {
                    if (strpos($page, '.php') === false) {
                        $page .= '.php';
                    }
                    if (file_exists($page)) {
                        require_once '../views/' . $page;
                    } else {
                        require_once 'homepage.php';
                    }
                } else {
                    require_once 'homepage.php';
                }
                ?>
            </div>
            <div id="news-section" class="dark-boxshadow">
                <?php
                if(!empty($messages) && $role != 'admin')
                    foreach ($messages as $message) {
                        echo '
                        <div class="new-item">
                            <h4>'.$message->getTitle().'</h4>
                            <h4>['.Course::constructWithId($message->getId_course())->getById()->getName().']</h4>
                            <p>'.$message->getContent().'</p>
                        </div>';
                    }
                ?>
            </div>
        </main>
        <footer class="dark-purple-background dark-boxshadow">
            <div id="footer-info">
                <div class="footer-section">
                    <h3>Links de Acesso Rápido</h3>
                    <ul>
                        <a href="#/courses"><h4>Disciplinas</h4></a>
                        <a href="./index.php?page=user/profile"><h4>Perfil</h4></a>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Suporte</h3>
                    <ul>
                        <a href="#/contact"><h4>Contato</h4></a>
                        <a href="#/support"><h4>Suporte Online</h4></a>
                    </ul>
                </div>
            </div>
            <h3 id=copyright-info>&#169 2018 - Academic Portal</h3>
        </footer>
        <script>
        function toogleSidenav() {
            var state = document.getElementById('sidenav').style.display;

            document.getElementById('sidenav').style.display = (state == 'block') ? 'none' : 'block';
        }
        function getById(objArray, id) {
            objArray.filter(function(obj) {
                return obj.b == id;
        })};
        </script>
    </body>
</html>