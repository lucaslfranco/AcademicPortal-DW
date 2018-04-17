<?php
    require_once './Models/User.php'
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Portal Academico</h1>
        <h3>Exercicio de Aula</h3>
        <?php
            $user = new User(1, "joaosilva", "palavrapasse", "João Silva", "joaos@email.com", "admin");
            echo $user->concatenate();
        ?>
        
        <h3>Exercício 18 (Tabela de Conversão Decimal -> Hexadecimal</h3>
        <?php
            $max_value = 15;
            for($i = 0; $i <= $max_value; $i++){
                $i_hexa = dechex($i);
                if($i < $max_value){
                    echo "$i/$i_hexa  -  ";
                }
                else{                    
                    echo "$i/$i_hexa";
                }
            }
         ?>
        
        <h3>Exercício 19 (Tabelas de Multiplicação)</h3>
        <?php
            for($i = 1; $i <= 10; $i++){
                echo sprintf("%'02d", $i) . " - ";
                for($j = 2; $j <= 10; $j++){
                    echo sprintf("%'02d", $i*$j) . " ";
                }
                echo "<br>";
            }
        ?>

        <h3>Exercício 20 ()</h3>
        <?php
            $text = "Random text to test!";
            echo "Number of each letter in text above: ";
            for($i = 0; $i < strlen($text); $i++){
                $letter = $text[$i];
                echo "<br> $letter in '$text' : " . substr_count($text, $letter);
            }
        ?>
    </body>
</html>
