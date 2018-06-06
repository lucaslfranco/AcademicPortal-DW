<?php

require_once '../BL/Course.php';

class courseController {

    // Receive an array of required fields to validate
    function validateFields($array_fields) {
        // Checks if the all fields are filled
        foreach ($array_fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

    public static function register() {
        $name = $_POST['name'] ?? '';
        $credits = $_POST['credits'] ?? '';
        $id_programme = $_POST['id-programme'] ?? '';
        $id_teacher = $_POST['id-teacher'] ?? '';

        $array_fields = ['name', 'credits', 'id-programme', 'id-teacher'];
        $newCourse = Course::constructWithParams($name, $credits, $id_programme, $id_teacher);

        if ((new self)->validateFields($array_fields)) {
            $newCourse->create();
        }
    }

    public static function update() {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $credits = $_POST['credits'] ?? '';
        $id_programme = $_POST['id-programme'] ?? '';
        $id_teacher = $_POST['id-teacher'] ?? '';

        $array_fields = ['id', 'name', 'credits', 'id-programme', 'id-teacher'];
        $course = Course::constructWithParams($name, $credits, $id_programme, $id_teacher);
        $course->setId($id);
        
        if ((new self)->validateFields($array_fields)) {
            $course->update();
        }
    }
    
    public static function remove() {
        $id = $_POST['id'] ?? '';
       
        $course = Course::constructWithId($id);
        
        if ((new self)->validateFields(['id'])) {
            $course->remove();
        }
    }
}