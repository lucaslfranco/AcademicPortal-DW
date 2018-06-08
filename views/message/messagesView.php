<?php
    $messages = (new Message())->getAll();
?>

<h2>Mensagens Cadastradas</h2>

<?php 
if($messages){
    echo '
        <table class="list-table">
            <tr>
              <th>Title</th>
              <th>Curso</th>
              <th style="border-right: none;"></th>
              <th style="border-left: none;"></th>
            </tr>';
            foreach ($messages as $message){
                echo '
                    <tr>
                        <td>'.$message->getTitle().'</td> 
                        <td>'.Course::constructWithId($message->getId_course())->getById()->getName().'</td> ';            

                echo '
                        <td class="table-icon edit-option" style="border-right: none;">
                            <a href="index.php?page=message/messagesView&message='.$message->getId().'#openEditModal" title="Editar Curso"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td class="table-icon delete-option" style="border-left: none;">
                            <form action="index.php?page=message/messagesView" class="no-form" method="post">
                                <input name="id" type="hidden" value="'.$message->getId().'">
                                <input name="process" type="hidden" value="message/remove">
                                <a onclick="this.parentNode.submit()" title="Deletar Curso"><i class="fas fa-trash"></i></a>
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
        <h3 style="text-align: center; margin-top: 2em;">Não há mensagens cadastradas!</h3>
    ';
}   
?>
<?php
    if(isset($_GET['message'])){
        require_once 'editModal.php';
    }
?>