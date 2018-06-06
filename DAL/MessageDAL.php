<?php
require_once '../DAL/DB.php';

class MessageDAL {

    static function create($message) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Inserts a message into the database
        $sql = "INSERT INTO message (title, content, id_course) VALUES (:title, :content, :id_course)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':title' => $message->getTitle(),
            ':content' => $message->getContent(),
            ':id_course' => $message->getId_course(),
        ));
        // Updates the message id with the auto generated ID of the database
        $message->setId($conn->lastInsertId());
    }

    static function getAll() {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches all messages from 'message' table of the database
        $sql = "SELECT * FROM message";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        $messages = $stmt->fetchAll();
        $stmt->closeCursor();
        return $messages;
    }

    static function getById($id) {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches a message by id
        $sql = "SELECT * FROM message WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        $message = $stmt->fetch();
        $stmt->closeCursor();
        return $message;
    }

    static function getByStudent($student_id) {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches messages by student from 'message' table of the database
        $sql = "SELECT m.* FROM user u JOIN enrollment e ON e.id_student = u.id JOIN course c "
                . "ON e.id_course = c.id JOIN message m ON m.id_course = c.id "
                . "WHERE u.id = :student_id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':student_id' => $student_id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        $messages = $stmt->fetchAll();
        $stmt->closeCursor();
        return $messages;
    }
    
    static function getByTeacher($teacher_id) {
        // Initializes database connection
        $conn = DB::createConnection();

        // Fetches messages by teacher from 'message' table of the database
        $sql = "SELECT m.* FROM user u join course c ON u.id = c.id_teacher JOIN message m "
                . "ON m.id_course = c.id WHERE u.id = :teacher_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':teacher_id' => $teacher_id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        $messages = $stmt->fetchAll();
        $stmt->closeCursor();
        return $messages;
    }    
    
    static function update($message) {
        // Initializes the database connection
        $conn = DB::createConnection();

        // Updates a message from the database
        $sql = "UPDATE message SET id = :id, title = :title, content = :content, "
                . "id_course = :id_course WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $message->getId(),
            ':title' => $message->getTitle(),
            ':content' => $message->getContent(),
            ':id_course' => $message->getId_course()
        ));
    }

    static function remove($id) {
        // Initializes database connection
        $conn = DB::createConnection();

        // Deletes a message by id
        $sql = "DELETE FROM message WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $stmt->closeCursor();
    }
}
