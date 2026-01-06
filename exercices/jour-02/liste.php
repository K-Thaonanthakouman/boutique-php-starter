<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $fromages = ["Camembert", "Fourme de Montbrison", "Brie de Meaux", "Comté", "Roquefort"];
        echo $fromages[0]; //affiche le premier élément du tableau ?>
    <br/>
    <?= $fromages[count($fromages)-1]; // affiche le dernier élément du tableau ?>
    <br/>
    <?= count($fromages); ?>
    <br/>
    
    <?php

        $fromages[] = "Gruyère";
        $fromages[] = "Coulommiers";
        unset($fromages[3-1]);
        var_dump($fromages);
        
    ?>


</body>
</html>