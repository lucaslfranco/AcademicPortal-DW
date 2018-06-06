<?php

require_once '../BL/Programme.php';

class programmeController {

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
        $degree = $_POST['degree'] ?? '';
        $id_director = $_POST['id-director'] ?? '';

        $array_fields = ['name', 'degree', 'id-director'];
        $newProgramme = Programme::constructWithParams($name, $degree, $id_director);

        if ((new self)->validateFields($array_fields)) {
            $newProgramme->create();
        }
    }

    public static function update() {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $degree = $_POST['degree'] ?? '';
        $id_director = $_POST['id-director'] ?? '';

        $array_fields = ['id', 'name', 'degree', 'id-director'];
        $programme = Programme::constructWithParams($name, $degree, $id_director);
        $programme->setId($id);
        
        if ((new self)->validateFields($array_fields)) {
            $programme->update();
        }
    }
     
    public static function remove() {
        $id = $_POST['id'] ?? '';
        
        $programme = Programme::constructWithId($id);
        
        if ((new self)->validateFields(['id'])) {
            $programme->remove();
        }
    }

}
