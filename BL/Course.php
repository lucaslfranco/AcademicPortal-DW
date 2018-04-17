<?php
/**
 * Description of Course
 *
 * @author lucasfranco
 */
class Course {
    private $id;
    private $name;
    private $credits;
    private $id_programme;
    private $id_teacher;
    
    function __construct($id, $name, $credits, $id_programme, $id_teacher) {
        $this->id = $id;
        $this->name = $name;
        $this->credits = $credits;
        $this->id_programme = $id_programme;
        $this->id_teacher = $id_teacher;
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
