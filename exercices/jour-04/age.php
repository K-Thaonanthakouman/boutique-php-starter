<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $age = rand(0, 99);
        echo $age . ' ans.<br/>';

        if ($age<6) {
            echo "Rentre chez toi regarder Pat'Patrouille !";
        }
        else if ($age<12) {
            echo "Rentre chez toi jouer à Pokemon !";
        }
        else if ($age<18) {
            echo "Non, cherche pas, on te servira pas d'alcool !";
        }
        else if ($age<25) {
            echo "Fais pas genre tu sais tout, p'tit con !";
        }
        else if ($age<35) {
            echo "Eeeeeeeh ouais, la réalité de la vie dans ta gueule, ça fait bizarre, hein ?!";
        }
        else if ($age<45) {
            echo "Allez, bouge, il te reste plus grand-chose à vivre !";
        }
        else if ($age<55) {
            echo "Eh voilà, le début des emmerdes.";
        }
        else if ($age<65) {
            echo "Là normalement, tu t'emmerdes chez toi mais tu vas regarder les vieilles séries à la télé tellement t'es crevé.";
        }
        else {
            echo "Tu meurs quand, déchet de la société ?";
        }

    ?>
    
</body>
</html>