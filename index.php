<?php
    require_once './BL/User.php'
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
            $user01 = User::constructWithParams("joao.silva", "palavrapasse", "João da Silva", "joaos@email.com", "admin");
            $user02 = User::constructWithParams("mariana.oliveira", "palavrapasse", "Mariana de Oliveira", "marianao@email.com", "teacher");
            $user03 = User::constructWithParams("paulo.pinheiros", "palavrapasse", "Paulo Souza Pinheiros", "paulosp@email.com", "student");
            
            // Tests user register()
            $user01->register();
            $user02->register();
            $user03->register();
            
            // Tests user getAll()
            $users = $user01->getAll();
            foreach($users as $user){
                print_r($user);
            }
            print_r("<br><br>");
            
            // Tests user getById()
            $user04 = new User();
            $user04->setId(2);
            $user = $user04->getById();
            print_r($user);
            
            // Tests user remove()
            $user02->remove();
            $users = $user02->getAll();
            foreach($users as $user){
                print_r($user);
            } 
            print_r($user);
           
            
        ?>  
    </body>
</html>
