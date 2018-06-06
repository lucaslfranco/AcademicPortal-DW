<?php
    $programmes = (new Programme())->getAll();
?>

<h2>Cursos Cadastrados</h2>

<table class="list-table">
  <tr>
    <th>Nome</th>
    <th>Nível</th>
    <th style="border-right: none;"></th>
    <th style="border-left: none;"></th>
  </tr>
    <?php
        foreach ($programmes as $programme){
            echo '
                <tr>
                    <td>'.$programme->getName().'</td> 
                    <td>'.$programme->getDegree().'</td> ';            
           
            echo '
                    <td class="table-icon edit-option" style="border-right: none;">
                        <a href="index.php?page=programme/programmesView&programme='.$programme->getId().'#openEditModal" title="Editar Curso"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="table-icon delete-option" style="border-left: none;">
                        <form action="index.php?page=programme/programmesView" class="no-form" method="post">
                            <input name="id" type="hidden" value="'.$programme->getId().'">
                            <input name="process" type="hidden" value="programme/remove">
                            <a onclick="this.parentNode.submit()" title="Deletar Curso"><i class="fas fa-trash"></i></a>
                        </form>
                </td>
                </tr>'
            ;
        }
    ?>
</table>
    
    <?php
        if(isset($_GET['programme'])){
            require_once 'editModal.php';
        }
    ?>