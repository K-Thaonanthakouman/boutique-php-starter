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
                "stock" => rand(1, 300),
            ];
        }

        $products[1]["stock"] = 0;
        $products[3]["stock"] = 0;
        $products[7]["stock"] = 0;
    ?>
    <p>
    <?php
        for($i=0; $i<10; $i++){
            var_dump($products[$i]);
            echo "<br/>";
        }
    ?>
    </p>

    <p>
    <?php
        for($i=0; $i<10; $i++){
            if ($products[$i]["stock"]==0){
                continue;
            }
            else{
                echo $products[$i]["name"] . ' : ' . $products[$i]["stock"] . ' en stock.<br>';
            }
        }
    ?>
    </p>

    <p>
    <?php
        for($i=0; $i<10; $i++){
            if ($products[$i]["stock"]>100){
                break;
            }
            else{
                echo $products[$i]["name"] . ' : ' . $products[$i]["stock"] . ' en stock.<br>';
            }
        }
    ?>
    </p>

    <p>
    <?php
        for($i=0; $i<10; $i++){
            if ($products[$i]["stock"]==0 || $products[$i]["stock"]>=100){
                continue;
            }
            else{
                echo $products[$i]["name"] . ' : ' . $products[$i]["stock"] . ' en stock.<br>';
            }
        }
    ?>
    </p>
    
</body>
</html>