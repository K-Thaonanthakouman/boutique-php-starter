<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $categories = ["Vêtements", "Chaussures", "Accessoires", "Sport"];
        $elemRecherche = "Chaussures";

        if (in_array($elemRecherche, $categories) == true) {
            echo "Oui, il y a $elemRecherche dans la variable \$categories";
        }
        else {
            echo "Non, il n'y a pas $elemRecherche dans la variable \$categories";
        }
    ?>
    <br/>

    <?php
        
        $elemRecherche = "Electronique";

        if (in_array($elemRecherche, $categories) == true) {
            echo "Oui, il y a $elemRecherche dans la variable \$categories";
        }
        else {
            echo "Non, il n'y a pas $elemRecherche dans la variable \$categories";
        }
    
    ?>
    <br/>

    <?php
        $elemRecherche = "Sport";
        $rechercheIndex = array_search($elemRecherche, $categories);
        echo "$elemRecherche se trouve à l'index $rechercheIndex du tableau \$categories";

    ?>



    
</body>
</html>