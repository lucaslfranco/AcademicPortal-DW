<?php
require_once '../DAL/DB.php';

class EnrollmentDAL {

    static function create($enrollment) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a enrollment into the database
        $sql = "INSERT INTO enrollment (id_course, id_student, id_grades, absences) VALUES (:id_course, :id_student, :id_grades, :absences)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_course' => $enrollment->getId_course(),
            ':id_student' => $enrollment->getId_student(),
            ':id_grades' => $enrollment->getId_grades(),
            ':absences' => $enrollment->getAbsences(),
        ));
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all enrollments from 'enrollment' table of the database
        $sql = "SELECT * FROM enrollment";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollments = $stmt->fetchAll();
        $stmt->closeCursor();
        return $enrollments;
    }   

    static function getByStudent($id_student){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches all enrollments by student id
        $sql = "SELECT * FROM enrollment WHERE  id_student = :id_student";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_student' => $id_student
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollments = $stmt->fetchAll();
        $stmt->closeCursor();
        return $enrollments;
    }
    
    static function getByCourse($id_course){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches all enrollments by course id
        $sql = "SELECT * FROM enrollment WHERE  id_course = :id_course";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_course' => $id_course
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollments = $stmt->fetchAll();
        $stmt->closeCursor();
        return $enrollments;
    }
    
    static function getByIds($enrollment){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a enrollment by id_course and id_student
        $sql = "SELECT * FROM enrollment WHERE id_course = :id_course AND id_student = :id_student";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_course' => $enrollment->getId_course(),
            ':id_student' => $enrollment->getId_student()
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollment = $stmt->fetch();
        $stmt->closeCursor();
        return $enrollment;        
    }
    
    static function update($enrollment){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a enrollment from the database
        $sql = "UPDATE enrollment SET id_course = :id_course, id_student = :id_student, "
                . "id_grades = :id_grades, absences = :absences WHERE id_course = :id_course AND id_student = :id_student";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_course' => $enrollment->getId_course(),
            ':id_student' => $enrollment->getId_student(),
            ':id_grades' => $enrollment->getId_grades(),
            ':absences' => $enrollment->getAbsences()
        ));
    }
    
    static function remove($enrollment){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes a user by id
        $sql = "DELETE FROM enrollment WHERE id_course = :id_course AND id_student = :id_student";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id_course' => $enrollment->getId_course(),
            ':id_student' => $enrollment->getId_student()
        ));
        $stmt->closeCursor();
    }
}
