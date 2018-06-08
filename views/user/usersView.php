<?php
    $users = $user->getAll();
?>

<h2>Usuários Cadastrados</h2>

<?php 
if($users){
    echo '
    <table class="list-table">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Ocupação</th>
          <th>Email</th>
          <th style="border-right: none;"></th>
          <th style="border-left: none;"></th>
        </tr> ';
            foreach ($users as $user){
                echo '
                    <tr>
                        <td>'.$user->getId().'
                        <td>'.$user->getName().'</td> ';            
                switch($user->getRole()){
                case 'admin':
                    echo '<td>Administrador</td>';
                    break;
                case 'student':
                    echo '<td>Aluno</td>';
                    break; 
                case 'teacher':
                    echo '<td>Professor</td>';
                    break;     
                }
                echo '
                    <td>'.$user->getEmail().'</td>
                    <td class="table-icon edit-option" style="border-right: none;">
                        <a href="index.php?page=user/usersView&user='.$user->getId().'#openEditModal" title="Editar Usuário"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="table-icon delete-option" style="border-left: none;">
                        <form action="index.php?page=user/usersView" class="no-form" method="post">
                        <input name="id" type="hidden" value="'.$user->getId().'">
                        <input name="process" type="hidden" value="user/remove">
                        <a onclick="this.parentNode.submit()" title="Deletar Usuário"><i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                    </tr>'
                ;
          }
    echo '
        </table>
    ';
}
else {
    echo '
        <h3 style="text-align: center; margin-top: 2em;">Não há usuários cadastrados!</h3>
    ';
}  
?>
<?php
    if(isset($_GET['user'])){
        require_once 'editModal.php';
    }
?>