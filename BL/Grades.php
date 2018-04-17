<?php

/**
 * Description of Grades
 *
 * @author lucasfranco
 */
class Grades {
    private $id;
    private $grade01;
    private $grade02;
    private $grade03;
    private $grade04;
    
    function __construct($id, $grade01, $grade02, $grade03, $grade04) {
        $this->id = $id;
        $this->grade01 = $grade01;
        $this->grade02 = $grade02;
        $this->grade03 = $grade03;
        $this->grade04 = $grade04;
    }

    function getId() {
        return $this->id;
    }
    function getGrade01() {
        return $this->grade01;
    }
    function getGrade02() {
        return $this->grade02;
    }
    function getGrade03() {
        return $this->grade03;
    }
    function getGrade04() {
        return $this->grade04;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setGrade01($grade01) {
        $this->grade01 = $grade01;
    }
    function setGrade02($grade02) {
        $this->grade02 = $grade02;
    }
    function setGrade03($grade03) {
        $this->grade03 = $grade03;
    }
    function setGrade04($grade04) {
        $this->grade04 = $grade04;
    }
    
}
