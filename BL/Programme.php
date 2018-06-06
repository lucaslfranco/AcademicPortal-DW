<?php
require_once '../DAL/ProgrammeDAL.php';

class Programme {
    public $id;
    public $name;
    public $degree;
    public $id_director;
    
    function __construct(){}
    
    static function constructWithId($id) {
        $programme = new Self();
        $programme->setId($id);
        
        return $programme;
    }

    static function constructWithParams($name, $degree, $id_director) {
        $programme = new Self();
        $programme->name = $name;
        $programme->degree = $degree;
        $programme->id_director = $id_director;
        
        return $programme;
    }

    function create(){
        return ProgrammeDAL::create($this);
    }
    
    function getAll(){
        return ProgrammeDAL::getAll();
    }
    
    function getById(){
        return ProgrammeDAL::getById($this->id);
    }
    
    function update(){
        return ProgrammeDAL::update($this);
    }
    
    function remove(){
        return ProgrammeDAL::remove($this->id);
    }    
    
    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
    function getDegree() {
        return $this->degree;
    }
    function getId_director() {
        return $this->id_director;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    function setName($name) {
        $this->name = $name;
    }
    function setDegree($degree) {
        $this->degree = $degree;
    }
    function setId_director($id_director) {
        $this->id_director = $id_director;
    }
}
