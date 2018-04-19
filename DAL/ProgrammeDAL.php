<?php
require_once './DAL/DB.php';

class ProgrammeDAL {
        static function create($programme) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a programme into the database
        $sql = "INSERT INTO programme (name, degree, idDirector) VALUES (:name, :degree, :idDirector)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $programme->getName(),
            ':degree' => $programme->getDegree(),
            ':idDirector' => $programme->getId_director(),
        ));
        // Updates the ID with the auto generated ID of the database
        $programme->setId($conn->lastInsertId());
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all from 'programme' table of the database
        $sql = "SELECT * FROM programme";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Programme');
        $programmes = $stmt->fetchAll();
        $stmt->closeCursor();
        return $programmes;
    }   

    static function getById($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a programme by id
        $sql = "SELECT * FROM programme WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Programme');
        $programme = $stmt->fetch();
        $stmt->closeCursor();
        return $programme;        
    }
    
    static function update($programme){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a programme from the database
        $sql = "UPDATE programme SET id = :id, name = :name, degree = :degree, "
                . "idDirector = :idDirector WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $programme->getId(),
            ':name' => $programme->getName(),
            ':degree' => $programme->getDegree(),
            ':idDirector' => $programme->getId_director()
        ));
    }
    
    static function remove($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes by id
        $sql = "DELETE FROM programme WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}
