<?php   
    $user = User::constructWithId($_GET['user'])->getById();
?>

<div id="openEditModal" class="modal">
    <div class="modal-content edit-modal">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <h2>Atualizar Dados do Usuário</h2>
        <form action="index.php?page=user/usersView>" method="post" class="modal-form">
            <div class="input-section thin-section grid-12">
                <p>Nome de Usuário</p>
                <input name="username" type="text" value="<?php echo $user->getUsername(); ?>" pattern=".{6,}" required autofocus>
            </div>
            <div class="input-section thin-section grid-12">
                <p>Palavra-Passe</p>
                <input name="password" type="password" value="<?php echo $user->getPassword(); ?>" pattern=".{6,}" title="Escolha uma palavra-passe com no mínimo 6 caracteres." required>		
            </div>
            <div class="input-section thin-section grid-12">
                <p>Nome Completo</p>
               <input name="name" type="text" value="<?php echo $user->getName(); ?>" pattern=".{3,}" required>
            </div>
            <div class="input-section thin-section grid-12">            
                <p>E-mail</p>
                <input name="email" type="email" value="<?php echo $user->getEmail(); ?>" required>		
            </div>
            <div class="input-section thin-section grid-12">            
            <p>Ocupação</p>
            <select name="role" id="role-select">
                <option value="admin" <?php echo $user->getRole() == 'admin'?'selected="selected"':'';?> >Administrador</option>
                <option value="student" <?php echo $user->getRole() == 'student'?'selected="selected"':'';?> >Aluno</option>
                <option value="teacher" <?php echo $user->getRole() == 'teacher'?'selected="selected"':'';?> >Professor</option>
            </select>
            </div>
            <input type="hidden" name="process" value="user/update">
            <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
            <button class="submit-button" type="submit">ATUALIZAR</button>
        </form>
    </div>
</div>