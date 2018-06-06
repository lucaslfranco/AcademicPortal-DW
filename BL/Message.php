<?php
require_once '../DAL/MessageDAL.php';

class Message {
    private $id;
    private $title;
    private $content;
    private $id_course;
    
    function __construct(){}
    
    static function constructWithParams($title, $content, $id_course) {
        $message = new Self();
        $message->title = $title;
        $message->content = $content;
        $message->id_course = $id_course;
        
        return $message;
    }

    function create(){
        return MessageDAL::create($this);
    }
    function getAll(){
        return MessageDAL::getAll();
    }
    function getById(){
        return MessageDAL::getById($this->id);
    }
    function getByStudent($student_id){
        return MessageDAL::getByStudent($student_id);
    }
    function getByTeacher($teacher_id){
        return MessageDAL::getByTeacher($teacher_id);
    }
    function update(){
        return MessageDAL::update($this);
    }
    function remove(){
        return MessageDAL::remove($this->id);
    }    

    function getId() {
        return $this->id;
    }
    function getTitle() {
        return $this->title;
    }
    function getContent() {
        return $this->content;
    }
    function getId_course() {
        return $this->id_course;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setTitle($title) {
        $this->title = $title;
    }
    function setContent($content) {
        $this->content = $content;
    }
    function setId_course($id_course) {
        $this->id_course = $id_course;
    }    
}