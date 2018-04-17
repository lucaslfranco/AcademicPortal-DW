<?php
/**
 * Description of Enrollment
 *
 * @author lucasfranco
 */
class Enrollment {
    private $id_course;
    private $id_student;
    private $id_grades;
    private $absences;
    
    function __construct($id_course, $id_student, $id_grades, $absences) {
        $this->id_course = $id_course;
        $this->id_student = $id_student;
        $this->id_grades = $id_grades;
        $this->absences = $absences;
    }

    function getId_course() {
        return $this->id_course;
    }
    function getId_student() {
        return $this->id_student;
    }
    function getId_grades() {
        return $this->id_grades;
    }
    function getAbsences() {
        return $this->absences;
    }

    function setId_course($id_course) {
        $this->id_course = $id_course;
    }
    function setId_student($id_student) {
        $this->id_student = $id_student;
    }
    function setId_grades($id_grades) {
        $this->id_grades = $id_grades;
    }
    function setAbsences($absences) {
        $this->absences = $absences;
    }
}
