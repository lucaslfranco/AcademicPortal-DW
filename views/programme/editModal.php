<?php   
    $programme = Programme::constructWithId($_GET['programme'])->getById();
    $users = (new User())->getAll();
?>

<div id="openEditModal" class="modal">
    <div class="modal-content edit-modal">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <h2>Atualizar Dados do Curso</h2>
        <form action="index.php?page=programme/programmesView>" method="post" class="modal-form">
            <div class="input-section thin-section grid-12">
                <p>Nome</p>
                <input name="name" type="text" value="<?php echo $programme->getName(); ?>" required autofocus>
            </div>
            <div class="input-section thin-section grid-12">
                <p>Nível</p>
                <input name="degree" type="text" value="<?php echo $programme->getDegree(); ?>" required>		
            </div>
            <div class="input-section thin-section grid-12">
                <p>Diretor</p>
                <select name="id-director">
                 <?php
                 foreach($users as $user) {
                     if($user->getRole() == 'teacher'){
                         echo '<option value="'.$user->getId().'"'; 
                                 if ($user->getId()==$programme->getId_director()) {
                                     echo 'selected="selected"';
                                 }
                        echo '>'.$user->getName().'</option>';                    
                     }
                 }
                 ?>
            </select>
            </div>
            <input type="hidden" name="process" value="programme/update">
            <input type="hidden" name="id" value="<?php echo $programme->getId(); ?>">
            <button class="submit-button" type="submit">ATUALIZAR</button>
        </form>
    </div>
</div>