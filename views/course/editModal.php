<?php       
    $course = Course::constructWithId($_GET['course'])->getById();
    $users = (new User())->getAll();
    $programmes = (new Programme())->getAll();
?>

<div id="openEditModal" class="modal">
    <div class="modal-content edit-modal">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <h2>Atualizar Dados da Disciplina</h2>
        <form action="index.php?page=course/coursesView>" method="post" class="modal-form">
            <div class="input-section thin-section grid-12">
                <p>Nome</p>
                <input name="name" type="text" value="<?php echo $course->getName(); ?>" required autofocus>
            </div>
            <div class="input-section thin-section grid-12">
                <p>Créditos</p>
                <input name="credits" type="number" value="<?php echo $course->getCredits(); ?>" required>		
            </div>
            <div class="input-section thin-section grid-12">
                <p>Curso</p>
                <select name="id-programme">
                <?php
                foreach($programmes as $programme) {
                    echo '<option value="'.$programme->getId().'"'; 
                        if ($programme->getId()==$course->getId_programme()) {
                            echo 'selected="selected"';
                        }   
                    echo '>'.$programme->getName().'</option>';                    
                }
                 ?>
                </select>
            </div>
            <div class="input-section thin-section grid-12">
                <p>Professor</p>
                <select name="id-teacher">
                 <?php
                 foreach($users as $user) {
                     if($user->getRole() == 'teacher'){
                         echo '<option value="'.$user->getId().'"'; 
                                 if ($user->getId()==$course->getId_teacher()) {
                                     echo 'selected="selected"';
                                 }
                        echo '>'.$user->getName().'</option>';                    
                     }
                 }
                 ?>
                </select>
            </div>
            <input type="hidden" name="process" value="course/update">
            <input type="hidden" name="id" value="<?php echo $course->getId(); ?>">
            <button class="submit-button" type="submit">ATUALIZAR</button>
        </form>
    </div>
</div>