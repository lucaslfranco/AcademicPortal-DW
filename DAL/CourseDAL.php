<?php
require_once './DAL/DB.php';

class CourseDAL {
    static function create($course) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a course into the database
        $sql = "INSERT INTO course (name, credits, idProgramme, idTeacher) VALUES (:name, :credits, :idProgramme, :idTeacher)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $course->getName(),
            ':credits' => $course->getCredits(),
            ':idProgramme' => $course->getId_programme(),
            ':idTeacher' => $course->getId_teacher(),
        ));
        // Updates the course id with the auto generated ID of the database
        $course->setId($conn->lastInsertId());
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all courses from 'course' table of the database
        $sql = "SELECT * FROM course";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Course');
        $courses = $stmt->fetchAll();
        $stmt->closeCursor();
        return $courses;
    }   

    static function getById($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Fetches a course by id
        $sql = "SELECT * FROM course WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Course');
        $course = $stmt->fetch();
        $stmt->closeCursor();
        return $course;        
    }
    
    static function update($course){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a course from the database
        $sql = "UPDATE course SET id = :id, name = :name, credits = :credits, "
                . "idProgramme = :idProgramme, idTeacher = :idTeacher WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $course->getId(),
            ':name' => $course->getName(),
            ':credits' => $course->getCredits(),
            ':idProgramme' => $course->getId_programme(),
            ':idTeacher' => $course->getId_teacher(),
        ));
    }
    
    static function remove($id){
        // Initializes database connection
        $conn = DB::createConnection();
 
        // Deletes a course by id
        $sql = "DELETE FROM course WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}
