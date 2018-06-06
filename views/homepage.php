<?php 
    $user = new User();
    $user->setId($_SESSION['user-id']);
    $user = $user->getById();

?>
<div class="view-formatting">
    <h2>Informações do Usuário</h2>
    <div class="content">
        <div class="view-section grid-5">
            <h3>Nome</h3>

            <p><?php echo $user->getName()?></p>
        </div>
        <div class="view-section grid-5">
            <h3>E-mail</h3>
            <p><?php echo $user->getEmail()?></p>
        </div>
    </div>
</div>