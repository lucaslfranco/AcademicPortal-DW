<?php
require_once './DAL/EnrollmentDAL.php';

class Enrollment {
    private $id_course;
    private $id_student;
    private $id_grades;
    private $absences;
    
    function __construct(){}
    
    static function constructWithParams($id_course, $id_student, $id_grades, $absences) {
        $enrollment = new self();
        $enrollment->id_course = $id_course;
        $enrollment->id_student = $id_student;
        $enrollment->id_grades = $id_grades;
        $enrollment->absences = $absences;
    
        return $enrollment;
    }
    
    function create(){
        EnrollmentDAL::create($this);
    }
    function getAll(){
        return EnrollmentDAL::getAll();
    }
    function getByCourse(){
        return EnrollmentDAL::getByCourse($this->id_course);
    }
    function getByStudent(){
        return EnrollmentDAL::getByStudent($this->id_student);
    }
    function getByIds(){
        return EnrollmentDAL::getByIds($this);
    }
    function update(){
        EnrollmentDAL::update($this);
    }
    function remove(){
        EnrollmentDAL::remove($this);
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
