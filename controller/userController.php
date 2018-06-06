<?php
    require_once '../BL/User.php';

class userController {
    // Receive an array of required fields to validate
    public function validateFields($array_fields) {
        // Checks if the all fields are filled
        foreach ($array_fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }
    
    public static function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Checks if the data is filled and if the user is already registered            
        $array_fields = ['username', 'password'];
        
        if ((new self)->validateFields($array_fields)) {
            // Try with username
            $user = new User();
            $user->setUsername($username);
            $user = $user->getByUsername();
            
            //If doesn't work with username, try with id
            if(!$user){
                $user = User::constructWithId($username)->getById();
            }
            
            // Checks if the user exists and the password matches
            if ($user && $user->password == $password) {
                // Starts session, stores user id and redirects to homepage
                session_start();
                $_SESSION['user-id'] = $user->getId();
                header('location: ../views/index.php');
            }
        }
    }
    
    public static function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? '';

        $newUser = User::constructWithParams($username, $password, $name, $email, $role);

        // Checks if the data is filled and if the user is not registered            
        $array_fields = ['username', 'password', 'name', 'email', 'role'];
        
        if ((new self)->validateFields($array_fields) && !$newUser->getByUsername()) {
            $newUser->create();
            if($_GET['new'] == true){
                session_start();
                $_SESSION['user-id'] = $newUser->getByUsername()->getId();
            }
            header('Location: ../views/index.php');
        }
    }

    public static function update() {
        $id = $_POST['id'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? '';
    
        $user = User::constructWithParams($username, $password, $name, $email, $role);
        $user->setId($id);
        
        // Checks if the data is filled and if the user is not registered            
        $array_fields = ['id', 'username', 'password', 'name', 'email', 'role'];
        
        if ((new self)->validateFields($array_fields)) {
            $user->update();
        }
    }

      public static function remove() {
        $id = $_POST['id'] ?? '';

        $user = User::constructWithId($id);
        
        if ((new self)->validateFields(['id'])) {
            $user->remove();
        }
    }
    
}
