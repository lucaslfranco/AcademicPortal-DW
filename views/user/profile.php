<div class="form-content">
    <form action="./index.php" method="post" class="grid-6 dark-boxshadow">
        <h3>Atualizar Perfil</h3>
        <div class="input-section grid-12">
            <p>Nome de Usuário</p>
            <input name="username" type="text" pattern=".{6,}" value="<?= $user->getUsername(); ?>" required autofocus>
        </div>
        <div class="input-section grid-12">
            <p>Palavra-Passe</p>
            <input name="password" type="password" value="<?= $user->getPassword(); ?>" pattern=".{6,}" title="Escolha uma palavra-passe com no mínimo 6 caracteres." required>		
        </div>
        <div class="input-section grid-12">
            <p>Nome Completo</p>
           <input name="name" type="text" value="<?= $user->getName(); ?>"  pattern=".{3,}" required>
        </div>
        <div class="input-section grid-12">            
            <p>E-mail</p>
            <input name="email" type="email" value="<?= $user->getEmail(); ?>"  required>		
        </div>
        <div class="input-section grid-12">            
        <p>Ocupação</p>
        <select name="role" id="role-select" disabled>
            <option value="admin" <?= $role == "admin" ? "selected" : ""; ?> >Administrador</option>
            <option value="student" <?= $role == "student" ? "selected" : ""; ?> >Aluno</option>
            <option value="teacher" <?= $role == "teacher" ? "selected" : ""; ?> >Professor</option>
        </select>
        </div>
        <input type="hidden" name="process" value="user/update">
        <button type="submit">ATUALIZAR</button>
    </form>
</div>
