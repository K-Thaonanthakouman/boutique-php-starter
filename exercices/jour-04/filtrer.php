<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        include("../../app/data.php");

        $productfound;
        $productall;

        foreach($products as $product) {
            $productall++;
            if ((($product["stock"] > 0) && ($product["prix"] < 50)) === false) {
                continue;
            }
            else { ?>
                <h3><?= $product["name"] ?></h3>
                <p><?= $product["stock"] ?> unité(s) disponibles, <?= number_format($product["prix"], 2, ",", " ") ?> €</p>
            <?php
            $productfound++;
            }
        }
    ?>
    <p><?= $productfound ?> produits trouvés sur <?= $productall ?>.</p>
    
    
</body>
</html>