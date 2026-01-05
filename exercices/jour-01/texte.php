<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $brand = "Nike";
        $model = "Air Max";

        echo 'Chaussures ' . $brand . ' ' . $model; ?>
    <br/>
    <?= "Chaussures $brand $model" ?>
    <br/>
    <?php 
        $phrase = 'Chaussures %s %s';
        echo sprintf($phrase, $brand, $model);
    ?>
    
</body>
</html>