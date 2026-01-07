<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $products = [];

        for($i=0; $i<10; $i++){
            $products[] = [
                "name" => 'Produit ' . $i+1,
                "prix" => rand(10, 100),
                "stock" => rand(0, 50),
            ];
            var_dump($products[$i]);
            echo "<br/>";

        }
        
    ?>

    <p>
    <?php
        for($i=0; $i<10; $i++){
            echo $products[$i]["name"] . ' : ' . $products[$i]["prix"] . ' cacahuètes, ' . $products[$i]["stock"] . ' en stock.<br/>';
        }
    ?>
    </p>




    
</body>
</html>