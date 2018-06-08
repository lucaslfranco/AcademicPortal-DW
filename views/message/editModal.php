<?php   
    $message = Message::constructWithId($_GET['message'])->getById();
    $courses = (new Course())->getAll();
?>

<div id="openEditModal" class="modal">
    <div class="modal-content edit-modal">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <h2>Atualizar Mensagem</h2>
        <form action="index.php?page=message/messagesView>" method="post" class="modal-form">
            <div class="input-section grid-12"> 
                <p>Título</p>
                <input type="text" name="title" value="<?php echo $message->getTitle(); ?>">
            </div>
            <div class="input-section grid-12">
                <p>Conteúdo</p>
                <textarea name="content" rows="5"><?php echo $message->getContent(); ?></textarea>
            </div>
             <div class="input-section thin-section grid-12">
                <p>Curso</p>
                <select name="id-course">
                 <?php
                 foreach($courses as $course) {
                    echo '<option value="'.$course->getId().'"'; 
                        if ($course->getId()==$message->getId_course()) {
                            echo 'selected="selected"';
                        }
                    echo '>'.$course->getName().'</option>';                    
                 }
                 ?>
            </select>
            </div>
            <input type="hidden" name="process" value="message/update">
            <input type="hidden" name="id" value="<?php echo $message->getId(); ?>">
            <button class="submit-button" type="submit">ATUALIZAR</button>
        </form>
    </div>
</div>