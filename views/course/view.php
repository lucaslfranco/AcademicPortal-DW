<?php
    foreach($courses as $course)
        if($course->getId() == $_GET['course'])
            break;
    
    $programme = Programme::constructWithId($course->getId_programme())->getById();
    if($role == 'student'){
        $teacher = User::constructWithId($course->getId_teacher())->getById();
        $enrollment = Enrollment::constructWithIds($course->getId(), $user->getId())->getByIds();
        $grades = Grades::constructWithId($enrollment->getId_grades())->getById();
    }
?>

<ul class="breadcrumb">
    <li><a href="./index.php">Home</a></li>
    <?php echo '<li>'.$course->getName().'</li>'; ?>
</ul>
<div class="view-formatting">
    <h2>Informações da Disciplina</h2>
    <div class="content">
        <div class="view-section grid-6">
            <h3>Nome da Disciplina</h3>
            <p><?php echo $course->getName()?></p>
        </div>
        <div class="view-section grid-5">
            <h3>Número de Créditos</h3>
            <p><?php echo $course->getCredits()?></p>
        </div>
        <div class="view-section grid-6">
            <h3>Curso</h3>
            <p><?php echo $programme->getName()?></p>
        </div>
        <div class="view-section grid-5">
            <h3>Nível</h3>
            <p><?php echo $programme->getDegree()?></p>
        </div>
        <?php
        if($role == 'student')
            echo '
                <div class="view-section grid-5" style="margin-bottom: 0;">
                    <h3>Professor</h3>
                    <p>'.$teacher->getName().'</p>
                </div>';    
        ?>
    </div>
    <?php
    if($role == 'teacher') {
        echo '<div class="button-options">
                <a href="./index.php?page=course/studentsView.php&course='.$course->getId().'" class="submit-button">LISTAR ALUNOS MATRICULADOS</a>
                <a href="#openModal" class="submit-button">ENVIAR MENSAGEM</a> '; 
                require_once './message/messageModal.php';
        echo '</div> ';
    }
    else {
        echo '
            <div class="grid-8" style="margin: auto;">
            <table class="list-table" style="margin: 0;">
                <tr>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Faltas</th>
                </tr>
                <tr>
                    <td>'.$grades->getGrade01().'</td>
                    <td>'.$grades->getGrade02().'</td>
                    <td>'.$grades->getGrade03().'</td>
                    <td>'.$grades->getGrade04().'</td>
                    <td>'.$enrollment->getAbsences().'</td>
                </tr>
            </table>
            </div>
        ';
    }
    ?>
</div>