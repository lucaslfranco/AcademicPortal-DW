<?php
require_once './DAL/DB.php';

class EnrollmentDAL {

    static function create($enrollment) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a enrollment into the database
        $sql = "INSERT INTO enrollment (idCourse, idStudent, idGrades, absences) VALUES (:idCourse, :idStudent, :idGrades, :absences)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idCourse' => $enrollment->getId_course(),
            ':idStudent' => $enrollment->getId_student(),
            ':idGrades' => $enrollment->getId_grades(),
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

    static function getByStudent($idStudent){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches all enrollments by student id
        $sql = "SELECT * FROM enrollment WHERE  idStudent = :idStudent";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idStudent' => $idStudent
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollments = $stmt->fetchAll();
        $stmt->closeCursor();
        return $enrollments;
    }
    
    static function getByCourse($idCourse){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches all enrollments by course id
        $sql = "SELECT * FROM enrollment WHERE  idCourse = :idCourse";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idCourse' => $idCourse
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Enrollment');
        $enrollments = $stmt->fetchAll();
        $stmt->closeCursor();
        return $enrollments;
    }
    
    static function getByIds($enrollment){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a enrollment by idCourse and idStudent
        $sql = "SELECT * FROM enrollment WHERE idCourse = :idCourse AND idStudent = :idStudent";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idCourse' => $enrollment->getId_course(),
            ':idStudent' => $enrollment->getId_student()
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
        $sql = "UPDATE enrollment SET idCourse = :idCourse, idStudent = :idStudent, "
                . "idGrades = :idGrades, absences = :absences WHERE idCourse = :idCourse AND idStudent = :idStudent";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idCourse' => $enrollment->getId_course(),
            ':idStudent' => $enrollment->getId_student(),
            ':idGrades' => $enrollment->getId_grades(),
            ':absences' => $enrollment->getAbsences()
        ));
    }
    
    static function remove($enrollment){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes a user by id
        $sql = "DELETE FROM enrollment WHERE idCourse = :idCourse AND idStudent = :idStudent";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':idCourse' => $enrollment->getId_course(),
            ':idStudent' => $enrollment->getId_student()
        ));
        $stmt->closeCursor();
    }
}
