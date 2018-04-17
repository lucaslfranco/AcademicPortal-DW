<?php

require_once './DAL/DB.php';

class UserDAL {

    static function create($user) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a user into the database
        $sql = "INSERT INTO user (username, password, name, email, role) VALUES (:username, :password, :name, :email, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':role' => $user->getRole()
        ));
        // Updates the user id with the auto generated ID of the database
        $user->setId($conn->lastInsertId());
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all users from 'user' table of the database
        $sql = "SELECT * FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        $stmt->closeCursor();
        return $users;
    }   

    static function getByAll($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a user by id
        $sql = "SELECT * FROM user WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        while($user = $stmt->fetch()){
            print_r($user);
        }
        $stmt->closeCursor();
        return $user;        
    }
    
    static function delete($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a user by id
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}
