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

        
        foreach($products as $product) { ?>
            <article>
                <h3><?= $product["name"] ?></h3>
                <p class="prix"><?= number_format($product["prix"], 2, ",", " ") ?> €</p>
                <p class="stock">Stock : <?= $product["stock"] ?></p>
            </article>
        <?php
        }

    ?>
    
</body>
</html>