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

    static function getById($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a user by id
        $sql = "SELECT * FROM user WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        $stmt->closeCursor();
        return $user;        
    }
    
    static function update($user){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a user from the database
        $sql = "UPDATE user SET id = :id, username = :username, password = :password, "
                . "name = :name, email = :email, role = :role WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $user->getId(),
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':role' => $user->getRole()
        ));
    }
    
    static function remove($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes a user by id
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}