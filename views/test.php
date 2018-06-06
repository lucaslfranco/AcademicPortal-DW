<?php
    require_once '../BL/Course.php';
    require_once '../BL/Enrollment.php';
    require_once '../BL/Grades.php';
    require_once '../BL/Message.php';
    require_once '../BL/Programme.php';
    require_once '../BL/User.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Academic Portal</h1>
        <?php
            if(isset($_GET['page'])){
                echo $_GET['page'];
            }
        ?>
        
        
        <?php
        //TESTS WITH 'USER' CLASSES
            print_r("<br>----------------TESTS WITH 'USER' CLASSES----------------<br><br>");
            $user01 = User::constructWithParams("joao.silva", "palavrapasse", "João da Silva", "joaos@email.com", "admin");
            $user02 = User::constructWithParams("mariana.oliveira", "palavrapasse", "Mariana de Oliveira", "marianao@email.com", "teacher");
            $user03 = User::constructWithParams("paulo.pinheiros", "palavrapasse", "Paulo Souza Pinheiros", "paulosp@email.com", "student");
            
            // Tests user register()
            $user01->create();
            $user02->create();
            $user03->create();
            
            // Tests user getAll()
            $users = $user01->getAll();
            foreach($users as $user){
                print_r($user);
                print_r("<br>");
            }
            print_r("<br>");
            
            // Tests user update()
            $user01->setName("João Paulo da Silva");
            $user01->setEmail("joaopsilva@email.com");
            $user01->update();
            
            // Tests user getById()
            $user04 = new User();
            $user04->setId($user01->getId());
            $user04 = $user04->getById();
            print_r($user04->getName());
            print_r("<br><br>");

            // Tests user remove()
            $user02->remove();
            $users = $user02->getAll();
            foreach($users as $user){
                print_r($user);
                print_r("<br>");
            } 
            print_r("<br>");
        
        //TESTS WITH 'PROGRAMME' CLASSES
            print_r("<br>----------------TESTS WITH 'PROGRAMME' CLASSES----------------<br><br>");
            $programme01 = Programme::constructWithParams("Engenharia Informática", "Licenciatura", "3");
            $programme02 = Programme::constructWithParams("Engenharia Eletrotécnica e de Computadores", "Licenciatura", "1");
            $programme03 = Programme::constructWithParams("Sistemas de Informação", "Mestrado", "3");
            
            // Tests programme create()
            $programme01->create();
            $programme02->create();
            $programme03->create();
            
            // Tests programme getAll()
            $programmes = $programme01->getAll();
            foreach($programmes as $programme){
                print_r($programme);
                print_r("<br>");
            }
            print_r("<br>");
         
            // Tests programme update()
            $programme01->setName("Eng. Informática");
            $programme01->update();
               
            // Tests programme getById()
            $programme04 = new Programme();
            $programme04->setId($programme01->getId());
            $programme = $programme04->getById();
            print_r($programme->getName());
            print_r("<br><br>");
            
            // Tests programme remove()
            $programme02->remove();
            $programmes = $programme02->getAll();
            foreach($programmes as $programme){
                print_r($programme);
                print_r("<br>");
            } 
            print_r("<br>");
     
        //TESTS WITH 'COURSE' CLASSES    
            print_r("<br>----------------TESTS WITH 'COURSE' CLASSES----------------<br><br>");
            $course01 = Course::constructWithParams("Desenvolvimento Web", "6", "1", "3");
            $course02 = Course::constructWithParams("Banco de Dados I", "6", "1", "1");
            $course03 = Course::constructWithParams("Banco de Dados II", "3", "1", "1");
            
            // Tests course create()
            $course01->create();
            $course02->create();
            $course03->create();
            
            // Tests course getAll()
            $courses = $course01->getAll();
            foreach($courses as $course){
                print_r($course);
                print_r("<br>");
            }
            print_r("<br>");
         
            // Tests course update()
            $course01->setName("Desenvolvimento de Aplicações Informáticas");
            $course01->update();
               
            // Tests course getById()
            $course04 = new Course();
            $course04->setId($course01->getId());
            $course = $course04->getById();
            print_r($course->getName());
            print_r("<br><br>");
            
            // Tests course remove()
            $course02->remove();
            $courses = $course02->getAll();
            foreach($courses as $course){
                print_r($course);
                print_r("<br>");
            } 
            print_r("<br>");
            
            
        //TESTS WITH 'GRADES' CLASSES    
            print_r("<br>----------------TESTS WITH 'GRADES' CLASSES----------------<br><br>");
            $grades01 = Grades::constructWithParams("10", "10", "10", "10");
            $grades02 = Grades::constructWithParams("16", "11", "11", "15");
            $grades03 = Grades::constructWithParams("10", "12", "7", "16");
            
            // Tests grades create()
            $grades01->create();
            $grades02->create();
            $grades03->create();
            
            // Tests grades getAll()
            $grades = $grades01->getAll();
            foreach($grades as $grade){
                print_r($grade);
                print_r("<br>");
            }
            print_r("<br>");
         
            // Tests grades update()
            $grades01->setGrade01("20");
            $grades01->update();
               
            // Tests grades getById()
            $grades04 = new Grades();
            $grades04->setId($grades01->getId());
            $grades = $grades04->getById();
            print_r($grades->getGrade01());
            print_r("<br><br>");
            
            // Tests grades remove()
            $grades02->remove();
            $grades = $grades02->getAll();
            foreach($grades as $grade){
                print_r($grade);
                print_r("<br>");
            } 
            print_r("<br>");
            
        //TESTS WITH 'MESSAGE' CLASSES    
            print_r("<br>----------------TESTS WITH 'MESSAGE' CLASSES----------------<br><br>");
            $message01 = Message::constructWithParams("Título 01", "Conteúdo da Mensagem 01", "1");
            $message02 = Message::constructWithParams("Título 02", "Conteúdo da Mensagem 02", "1");
            $message03 = Message::constructWithParams("Título 03", "Conteúdo da Mensagem 03", "3");
            
            // Tests message create()
            $message01->create();
            $message02->create();
            $message03->create();
            
            // Tests message getAll()
            $messages = $message01->getAll();
            foreach($messages as $message){
                print_r($message);
                print_r("<br>");
            }
            print_r("<br>");
         
            // Tests message update()
            $message01->setTitle("Título 01 atualizado!");
            $message01->update();
               
            // Tests message getById()
            $message04 = new Message();
            $message04->setId($message01->getId());
            $message = $message04->getById();
            print_r($message->getContent());
            print_r("<br><br>");
            
            // Tests message remove()
            $message02->remove();
            $messages = $message02->getAll();
            foreach($messages as $message){
                print_r($message);
                print_r("<br>");
            } 
            print_r("<br>");
            
        //TESTS WITH 'ENROLLMENT' CLASSES    
            print_r("<br>----------------TESTS WITH 'ENROLLMENT' CLASSES----------------<br><br>");
            $enrollment01 = Enrollment::constructWithParams("1", "1", "1", "2");
            $enrollment02 = Enrollment::constructWithParams("1", "3", "3", "0");
            $enrollment03 = Enrollment::constructWithParams("3", "3", "1", "4");
            
            // Tests enrollment create()
            $enrollment01->create();
            $enrollment02->create();
            $enrollment03->create();
            
            // Tests enrollment getAll()
            $enrollments = $enrollment01->getAll();
            foreach($enrollments as $enrollment){
                print_r($enrollment);
                print_r("<br>");
            }
            print_r("<br>");
         
            // Tests enrollment update()
            $enrollment01->setAbsences("8");
            $enrollment01->update();
               
            // Tests enrollment getByCourse(), getByStudent(), getByIds()
            $enrollment04 = new Enrollment();
            $enrollment04->setId_course($enrollment01->getId_course());
            $enrollment04->setId_student($enrollment01->getId_student());
            
            $enrollments = $enrollment04->getByCourse();
            foreach($enrollments as $enrollment){
                print_r($enrollment);
                print_r("<br>");
            } 
            print_r("<br>");
            $enrollments = $enrollment04->getByStudent();
            print_r($enrollment);
            print_r("<br><br>");
            $enrollments = $enrollment04->getByIds();
            print_r($enrollment);
            print_r("<br><br>");
            
            // Tests enrollment remove()
            $enrollment02->remove();
            $enrollments = $enrollment02->getAll();
            foreach($enrollments as $enrollment){
                print_r($enrollment);
                print_r("<br>");
            } 
            print_r("<br>");    
        ?>  
    </body>
</html>
