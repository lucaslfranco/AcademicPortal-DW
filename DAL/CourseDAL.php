<?php
require_once '../DAL/DB.php';

class CourseDAL {
    static function create($course) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a course into the database
        $sql = "INSERT INTO course (name, credits, id_programme, id_teacher) VALUES (:name, :credits, :id_programme, :id_teacher)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $course->getName(),
            ':credits' => $course->getCredits(),
            ':id_programme' => $course->getId_programme(),
            ':id_teacher' => $course->getId_teacher(),
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
    
    static function getByStudent($student_id){
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all courses from 'course' table of the database
        $sql = "SELECT * FROM course join enrollment on course.id = enrollment.id_course and enrollment.id_student = :student_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':student_id' => $student_id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Course');
        $courses = $stmt->fetchAll();
        $stmt->closeCursor();
        return $courses;
    }
    static function getByTeacher($teacher_id){
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all courses from 'course' table of the database
        $sql = "SELECT * FROM course where id_teacher = :teacher_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':teacher_id' => $teacher_id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Course');
        $courses = $stmt->fetchAll();
        $stmt->closeCursor();
        return $courses;
    }
    
    static function update($course){
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a course from the database
        $sql = "UPDATE course SET id = :id, name = :name, credits = :credits, "
                . "id_programme = :id_programme, id_teacher = :id_teacher WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $course->getId(),
            ':name' => $course->getName(),
            ':credits' => $course->getCredits(),
            ':id_programme' => $course->getId_programme(),
            ':id_teacher' => $course->getId_teacher(),
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
