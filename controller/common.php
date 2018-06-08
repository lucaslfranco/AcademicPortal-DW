<?php
    require_once '../BL/Enrollment.php';
    require_once '../BL/User.php';

    switch($_GET['action']){
        // Checks if the user exists and returns the user name
        case 'checksUser':
            if(isset($_GET['user-id'])){
                $user = User::constructWithId($_GET['user-id'])->getById();
                if($user && $user->getRole() == 'student'){
                    $msg['name'] = $user->getName();
                    
                    echo json_encode($msg);
                }
            }
            break;
        
        // Checks if the student is already enrolled in the course
        case 'alreadyEnrolled':
            if(isset($_GET['user-id'], $_GET['course-id'])){
                $enrollment = Enrollment::constructWithIds($_GET['course-id'], $_GET['user-id'])->getByIds();
                // User isn't enrolled
                if (!$enrollment){
                    echo "ok";
                }
            }
            break;          
    }
?>
