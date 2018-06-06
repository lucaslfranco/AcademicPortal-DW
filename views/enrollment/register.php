<?php
    $users = new User();
    $users = $users->getAll();
    
    $courses = new Course();
    $courses = $courses->getAll();
?>

<div class="form-content">
    <form action="./index.php" method="post" name="enrollmentForm" onsubmit="return alreadyEnrolled()" class="grid-6 dark-boxshadow">
        <h2 class="page-title">Matricular Aluno</h2>
        <div class="input-section grid-12">
            <p>Código do Aluno</p>
            <input id="user-id" name="id-student" onfocusout="checksStudent()">
        </div>
        <div class="input-section grid-12">
            <p>Nome do Aluno</p>
            <input id="user-name" name="name" disabled>
        </div>
        <div class="input-section grid-12">
            <p>Disciplina</p>
            <select name="id-course" id="id-course">
                <?php
                foreach($courses as $course) {
                    echo '<option value='.$course->getId().'>'.$course->getName().'</option>';                    
                }
            ?>
            </select>            
        </div>
        <input type="hidden" name="process" value="enrollment/register">
        <button class="submit-button" id="enrollment-button" disabled>CADASTRAR</button>
    </form>
</div>