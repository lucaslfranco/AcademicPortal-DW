<?php
require_once '../DAL/CourseDAL.php';

class Course {
    private $id;
    private $name;
    private $credits;
    private $id_programme;
    private $id_teacher;
    
    function __construct() {}
    
    static function constructWithId($id) {
        $course = new Self();
        $course->id = $id;
        
        return $course;
    }
    
    static function constructWithParams($name, $credits, $id_programme, $id_teacher) {
        $course = new Self();
        $course->name = $name;
        $course->credits = $credits;
        $course->id_programme = $id_programme;
        $course->id_teacher = $id_teacher;
    
        return $course;
    }
    
    function create(){
        return CourseDAL::create($this);
    }
    function getAll(){
        return CourseDAL::getAll();
    }
    function getById(){
        return CourseDAL::getById($this->id);
    }
    function getByStudent($student_id){
        return CourseDAL::getByStudent($student_id);
    }
    function getByTeacher($teacher_id){
        return CourseDAL::getByTeacher($teacher_id);
    }
    function update(){
        return CourseDAL::update($this);
    }
    function remove(){
        return CourseDAL::remove($this->id);
    }
    
    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
    function getCredits() {
        return $this->credits;
    }
    function getId_programme() {
        return $this->id_programme;
    }
    function getId_teacher() {
        return $this->id_teacher;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setName($name) {
        $this->name = $name;
    }
    function setCredits($credits) {
        $this->credits = $credits;
    }
    function setId_programme($id_programme) {
        $this->id_programme = $id_programme;
    }
    function setId_teacher($id_teacher) {
        $this->id_teacher = $id_teacher;
    }
}
