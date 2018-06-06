<?php
    require_once '../controller/gradesController.php';
    
    $student = User::constructWithId($_GET['student'])->getById();
    $enrollment = Enrollment::constructWithIds($_GET['course'], $_GET['student'])->getByIds();
    $grades = Grades::constructWithId($enrollment->getId_grades())->getById();
    
    if(isset($_POST['gradesAction']) && ($_POST['gradesAction'] == 'update' )){
        gradesController::update();
    }
?>

<div id="openModal" class="modal">
    <div class="modal-content">
        <a href="#closeModal" title="Fechar" class="closeModal">X</a>
        <h2>Situação do aluno</h2>
        <form id="grades-form" action="index.php?page=course/studentsView.php&course=<?php echo $_GET['course']; ?>&student=<?php echo $_GET['student']; ?>" method="post" class="modal-form">
            <div class="input-section grid-12"> 
                <p>Nome</p>
                <input type="text" name="name" value="<?php echo $student->getName(); ?>" disabled>
            </div>
            <div class="input-section grid-2">
                <p>Nota 1</p>
                <input type="number" name="grade1" value="<?php echo $grades->getGrade01(); ?>" min="0">
            </div>
            <div class="input-section grid-2">
                <p>Nota 2</p>
                <input type="number" name="grade2" value="<?php echo $grades->getGrade02(); ?>" min="0">
            </div>
            <div class="input-section grid-2">
                <p>Nota 3</p>
                <input type="number" name="grade3" value="<?php echo $grades->getGrade03(); ?>" min="0">
            </div>
            <div class="input-section grid-2">
                <p>Nota 4</p>
                <input type="number" name="grade4" value="<?php echo $grades->getGrade04(); ?>" min="0">
            </div>
            <div class="input-section grid-2">
                <p>Faltas</p>
                <input type="number" name="absences" value="<?php echo $enrollment->getAbsences(); ?>" min="0">
            </div>
            <input name="course" type="hidden" value="<?php echo $_GET['course']; ?>">
            <input name="student" type="hidden" value="<?php echo $student->getId(); ?>">
            <input name="gradesAction" type="hidden" value="update">
            <button>ATUALIZAR</button>
        </form>
    </div>
</div>