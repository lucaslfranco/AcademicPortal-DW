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
}
