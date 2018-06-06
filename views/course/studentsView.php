<?php
    $students = $user->getByCourse($_GET['course']);
?>

<h2>Alunos Matriculados</h2>

<table class="list-table">
  <tr>
    <th>Nome</th>
    <th>Email</th>
    <th></th>
  </tr>
    <?php
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
    ?>
</table>
<div class="button-options">
    <?php echo '<a href="./index.php?page=course/view.php&course='.$_GET['course'].'" class="submit-button">VOLTAR</a>'; ?>
</div>          
