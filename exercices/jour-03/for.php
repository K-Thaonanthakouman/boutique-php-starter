<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        for ($i=0; $i<10; $i++) {
            echo $i+1 . ' ';
        }
    ?>
    <br/>
    <?php

        for ($i=1; $j<20; $i++) {
            $j = 2*$i;
            echo $j . ' ';
        }
    ?>
    <br/>
    <?php

        for ($i=10; $i>=0; $i--) {
            echo $i . ' ';
        }
    ?>
    <br/>
    <?php

        for ($i=1; $i<=10; $i++) {
            echo 7*$i . ' ';
        }

    ?>
    
</body>
</html>