<?php
require_once '../BL/Enrollment.php';
require_once '../BL/Grades.php';

class enrollmentController {

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
        $id_course = $_POST['id-course'] ?? '';
        $id_student = $_POST['id-student'] ?? '';

        $array_fields = ['id-course', 'id-student'];

        if ((new self)->validateFields($array_fields)) {
            $newGrades = new Grades();
            $newGrades->create();

            $newEnrollment = Enrollment::constructWithParams($id_course, $id_student, $newGrades->getId(), 0);
            $newEnrollment->create();
        }
    }
}
