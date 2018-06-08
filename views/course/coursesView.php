<?php
    $courses = (new Course())->getAll();
?>

<h2>Disciplinas Cadastrados</h2>

<?php 
if($courses){
    echo '
    <table class="list-table">
        <tr>
            <th>Nome</th>
            <th>Curso</th>
            <th>Professor</th>
            <th style="border-right: none;"></th>
            <th style="border-left: none;"></th>
          </tr> ';
    
        foreach ($courses as $course){
                echo '
                    <tr>
                        <td>'.$course->getName().'</td> 
                        <td>'.Programme::constructWithId($course->getId_programme())->getById()->getName().'</td>
                        <td>'.User::constructWithId($course->getId_teacher())->getById()->getName().'</td> ';

                echo '
                        <td class="table-icon edit-option" style="border-right: none;">
                            <a href="index.php?page=course/coursesView&course='.$course->getId().'#openEditModal" title="Editar Curso"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td class="table-icon delete-option" style="border-left: none;">
                            <form action="index.php?page=course/coursesView" class="no-form" method="post">
                                <input name="id" type="hidden" value="'.$course->getId().'">
                                <input name="process" type="hidden" value="course/remove">
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
          <h3 style="text-align: center; margin-top: 2em;">Não há disciplinas cadastradas!</h3>
      ';
}
?>    
<?php
    if(isset($_GET['course'])){
        require_once 'editModal.php';
    }
?>