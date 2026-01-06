<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $products = [
            ["name" => "Thé", "price" => 10, "stock" => 56],
            ["name" => "Café", "price" => 8, "stock" => 43],
            ["name" => "Chocolat chaud", "price" => 5, "stock" => 97],
        ];
        echo $products[2]["name"]; ?>
    <br/>
    <?= $products[0]["price"] ?>
    <br/>
    <?= $products[count($products)-1]["stock"] ?>
    <br/>
    <?php

        $products[1]["stock"] = $products[1]["stock"] + 10;
        echo $products[1]["stock"];


    ?>



    
</body>
</html>