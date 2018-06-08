<?php
    $students = $user->getByCourse($_GET['course']);
?>

<ul class="breadcrumb">
    <li><a href="./index.php">Home</a></li>
    <li><a href="./index.php?page=course/view&course=<?= $_GET['course'] ?>"><?= $course->getName() ?></a></li>
    <li>Alunos Matriculados</li>
</ul>
<div class="view-formatting">
    <h2>Alunos Matriculados</h2>

    <?php 
    if($students){
        echo '
            <table class="list-table">
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th></th>
                </tr>
        ';
        foreach ($students as $student){
            echo '
                <tr>
                    <td>'.$student->getName().'</td>
                    <td>'.$student->getEmail().'</td>
                    <td class="table-icon">
                        <a href="./index.php?page=course/studentsView.php&course='.$_GET['course'].'&student='.$student->getId().'#openModal"><i class="fas fa-arrow-alt-circle-right"></i></a>';
                        if(isset($_GET['student'])) { 
                            require_once 'studentDetailsModal.php';
                            unset($_GET['student']);
                        }
            echo '</td>
                </tr>'
            ;
            }
        echo '
            </table>
            ';
        }
    else {
        echo '
            <h3 style="text-align: center;">Não há alunos matriculados nesta disciplina!</h3>
        ';
    }
    ?>
</div>
<div class="button-options">
    <?= '<a href="./index.php?page=course/view.php&course='.$_GET['course'].'" class="submit-button">VOLTAR</a>'; ?>
</div>          
