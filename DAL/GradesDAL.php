<?php
require_once './DAL/DB.php';

class GradesDAL {
    
    static function create($grades) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a grades set into the database
        $sql = "INSERT INTO grades (grade01, grade02, grade03, grade04) VALUES (:grade01, :grade02, :grade03, :grade04)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':grade01' => $grades->getGrade01(),
            ':grade02' => $grades->getGrade02(),
            ':grade03' => $grades->getGrade03(),
            ':grade04' => $grades->getGrade04(),
        ));
        // Updates the grades id with the auto generated ID of the database
        $grades->setId($conn->lastInsertId());
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all grades from 'grades' table of the database
        $sql = "SELECT * FROM grades";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Grades');
        $grades = $stmt->fetchAll();
        $stmt->closeCursor();
        return $grades;
    }   

    static function getById($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a grades set by id
        $sql = "SELECT * FROM grades WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Grades');
        $grades = $stmt->fetch();
        $stmt->closeCursor();
        return $grades;        
    }
    
    static function update($grades){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a grades set from the database
        $sql = "UPDATE grades SET id = :id, grade01 = :grade01, grade02 = :grade02, "
                . " grade03 = :grade03, grade04 = :grade04 WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $grades->getId(),
            ':grade01' => $grades->getGrade01(),
            ':grade02' => $grades->getGrade02(),
            ':grade03' => $grades->getGrade03(),
            ':grade04' => $grades->getGrade04()
        ));
    }
    
    static function remove($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes a grade by id
        $sql = "DELETE FROM grades WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}
