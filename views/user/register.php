

<div class="form-content">
    <form action="./index.php" method="post" class="grid-6 dark-boxshadow">
        <h3>Cadastrar Usuário</h3>
        <div class="input-section grid-12">
            <p>Nome de Usuário</p>
            <input name="username" type="text" placeholder="Entre com seu nome de usuário" pattern=".{6,}" required autofocus>
        </div>
        <div class="input-section grid-12">
            <p>Palavra-Passe</p>
            <input name="password" type="password" placeholder="Entre com a palavra-passe" pattern=".{6,}" title="Escolha uma palavra-passe com no mínimo 6 caracteres." required>		
        </div>
        <div class="input-section grid-12">
            <p>Nome Completo</p>
           <input name="name" type="text" placeholder="Entre com seu nome" pattern=".{3,}" required>
        </div>
        <div class="input-section grid-12">            
            <p>E-mail</p>
            <input name="email" type="email" placeholder="Entre com seu e-mail" required>		
        </div>
        <div class="input-section grid-12">            
        <p>Ocupação</p>
        <select name="role" id="role-select">
            <option value="admin">Administrador</option>
            <option value="student" selected="selected">Aluno</option>
            <option value="teacher">Professor</option>
        </select>
        </div>
        <input type="hidden" name="process" value="user/register">
        <button type="submit">CADASTRAR</button>
    </form>
</div>