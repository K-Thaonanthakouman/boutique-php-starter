<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $firstNames = ["Pikachu", "Artikodin", "Dracofeu", "Mewtwo", "Canarticho"];
    ?>
    <ul>
    <?php 
        foreach($firstNames as $firstName) {
            $i++;
            echo "<li>$i. $firstName</li>";
        }
    ?>
    </ul>
    
</body>
</html>