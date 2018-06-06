<?php 
    require_once '../controller/messageController.php';
    
    if(isset($_POST['messageAction']) && ($_POST['messageAction'] == 'register' )){
        messageController::register();
    }
?>

<div id="openModal" class="modal">
    <div class="modal-content">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <?php echo '<h2>Enviar Mensagem à ' . $course->getName() . '</h2>'; ?>
        <form action='index.php?page=course/view&course=<?php echo $course->getId(); ?>' method="post" class="modal-form">
            <div class="input-section grid-12"> 
                <p>Título</p>
                <input type="text" name="title">
            </div>
            <div class="input-section grid-12">
                <p>Conteúdo</p>
                <textarea name="content" rows="5"></textarea>
            </div>
            <input name="messageAction" type="hidden" value="register">
            <button>ENVIAR</button>
        </form>
    </div>
</div>