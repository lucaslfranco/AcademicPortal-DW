<?php

    require_once '../BL/Course.php';
    require_once '../BL/Enrollment.php';
    require_once '../BL/Grades.php';
    require_once '../BL/Programme.php';
    require_once '../BL/User.php';

    require_once 'courseController.php';
    require_once 'enrollmentController.php';
    require_once 'programmeController.php';
    require_once 'userController.php';

class mainController {
        
    public static function initialize(){
        if(!isset($_SESSION['user-id'])){
            header('location: ./login.php');
        }

        $user = User::constructWithId($_SESSION['user-id'])->getById();
        $role = $user->getRole();
        $courses = null;
        switch($role){
            case 'student':
                $courses = (new Course())->getByStudent($_SESSION['user-id']);    
                break;
            case 'teacher':
                $courses = (new Course())->getByTeacher($_SESSION['user-id']);
                break;
            }
            
        return array($user, $role, $courses);
    }
    
    public static function process() {
        if (isset($_POST['process'])) {
            // Get the params in the format -> entity/action
            $entity_action = explode('/', $_POST['process']);
            $entity = $entity_action[0];
            $action = $entity_action[1];

            $entity .= 'Controller';
            if(class_exists($entity)){
                // Invoke the method $action of the controller class $entity 
                $reflectMethod = new ReflectionMethod($entity, $action);
                $reflectMethod->invoke(null, $action);
            }
        }
    }
}
