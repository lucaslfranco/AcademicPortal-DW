<?php
    require_once '../BL/Enrollment.php';
    require_once '../BL/Grades.php';

class gradesController {

    public static function update() {
        $grade01 = $_POST['grade1'] ?? '';
        $grade02 = $_POST['grade2'] ?? '';
        $grade03 = $_POST['grade3'] ?? '';
        $grade04 = $_POST['grade4'] ?? '';
        $absences = $_POST['absences'] ?? '';
        $id_course = $_POST['course'] ?? '';
        $id_student = $_POST['student'] ?? '';
        
        $array_fields = ['grade1', 'grade2', 'grade3', 'grade4', 'absences'];
        
        $enrollment = Enrollment::constructWithIds($id_course, $id_student)->getByIds();
        $enrollment->setAbsences($absences);
        $enrollment->update();

        $grades = Grades::constructWithParams($grade01, $grade02, $grade03, $grade04);
        $grades->setId($enrollment->getId_grades());
        $grades->update();
    }
}
