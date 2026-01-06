<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $product = [
            "name" => "fusil à pompe",
            "description" => "une arme faite pour déboîter des mâchoires (voire plus)",
            "price" => 5000,
            "stock" => 7,
            "category" => "une arme à feu",
            "brand" => "Winchester",
        ];

    ?>
    <p>
        Ceci est un <?= $product["name"] ?>, <?= $product["description"] ?>, et c'est de la marque <?= $product["brand"] ?>.<br/>
        Vous avez donc bien compris que c'est <?= $product["category"] ?>. Il coûte <?= $product["price"] ?> cacahuètes, nous en avons <?= $product["stock"] ?> en magasin.
    </p>

    <?php

        $product["dateAdded"] = date("d/m/Y");
        $product["remise"] = 15;
        var_dump($product);
    ?>
    <br/>
    <?= var_dump($product["pikachu"]); // affiche NULL ?>

    <p>
        Et aujourd'hui, le <?= $product["dateAdded"] ?>, nous effectuons une remise de <?= $product["remise"] ?>%, le prix passe donc à <?= $product["price"]*(100-$product["remise"])/100 ?> cacahuètes !
    </p>

    
</body>
</html>