<?php
    $user = new User();
    $users = $user->getAll();
    
    $programmes = new Programme();
    $programmes = $programmes->getAll();
?>

<div class="form-content">
    <form action="./index.php" method="post" class="grid-4 dark-boxshadow">
        <h2 class="page-title">Cadastro de Curso</h2>
        <div class="input-section grid-12">
            <p>Nome do Curso</p>
            <input name="name" required>
        </div>
        <div class="input-section grid-12">
            <p>Nível</p>
            <select name="degree">
                <option value="Tecnologo">Técnologo</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Mestrado">Mestrado</option>
                <option value="Doutoramento">Doutoramento</option>
            </select>
        </div>
        <div class="input-section grid-12">
            <p>Diretor do Curso</p>
            <select name="id-director">
                <?php
                foreach($users as $user) {
                    if($user->getRole() == 'teacher'){
                        echo '<option value='.$user->getId().'>'.$user->getName().'</option>';                    
                    }
                }
            ?>
            </select>            
        </div>
        <input type="hidden" name="process" value="programme/register">
        <button>CADASTRAR</button>
    </form>

    <form action="./index.php" method="post" class="grid-4 dark-boxshadow">
        <h2 class="page-title">Cadastro de Disciplina</h2>
        <div class="input-section grid-12">
            <p>Nome da Disciplina</p>
            <input name="name" required>
        </div>
        <div class="input-section grid-12">
            <p>Créditos</p>
            <input type="number" name="credits" required>
        </div>
        <div class="input-section grid-12">
            <p>Curso</p>
            <select name="id-programme">
                <?php
                foreach($programmes as $programme) {                    
                    echo '<option value='.$programme->getId().'>'.$programme->getName().'</option>';
                }
            ?>
            </select>            
        </div>
        <div class="input-section grid-12">
            <p>Professor</p>
            <select name="id-teacher">
                <?php
                foreach($users as $user) {
                    if($user->getRole() == 'teacher'){
                        echo '<option value='.$user->getId().'>'.$user->getName().'</option>';                    
                    }
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="process" value="course/register">
        <button>CADASTRAR</button>
    </form>
</div>