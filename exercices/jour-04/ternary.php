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
            "name" => "Sous-marin",
            "prix" => 450000,
            "stock" => 3,
            "onSale" => false,
            "taux_promo" => 20
        ];
        $dispo;
        ($product["stock"] > 0) && ($product["onSale"] == true) ? $dispo = "dispo" : $dispo = "rupture";
    ?>
    <div class="produit<?= $dispo ?>">
            <h3><?= $product["name"] ?> <?= $product["onSale"] === true ? "🔥 PROMO" : ""; ?></h3>
            <p><strike><?= $product["prix"] ?> boulons</strike> <?= $product["prix"]-($product["prix"]*$product["taux_promo"]/100) ?> boulons</p>
    </div>
    
</body>
</html>