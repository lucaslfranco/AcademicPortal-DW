<?php
    require_once '../BL/Message.php';

class messageController {

    public static function register() {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $id_course = $_GET['course'] ?? '';

        if (!empty($title) && !empty($id_course)) {
            $newMessage = Message::constructWithParams($title, $content, $id_course);
            $newMessage->create();
        }
    }
    
    public static function update() {
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $id_course = $_POST['id-course'] ?? '';

        if (!empty($title) && !empty($id_course)) {
            $message = Message::constructWithParams($title, $content, $id_course);
            $message->setId($id);
            $message->update();
        }
    }
}
