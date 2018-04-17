<?php

/**
 * Description of Programme
 *
 * @author lucasfranco
 */
class Programme {
    private $id;
    private $name;
    private $degree;
    private $id_director;
    
    function __construct($id, $name, $degree, $id_director) {
        $this->id = $id;
        $this->name = $name;
        $this->degree = $degree;
        $this->id_director = $id_director;
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
