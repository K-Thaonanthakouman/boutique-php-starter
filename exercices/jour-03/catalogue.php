<?php
include("../../app/data.php")
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .grille { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .produit { border: 1px solid #ddd; padding: 15px; }
        .rupture { color: red; }
        .en-stock { color: green; }
        .image { width: 200px; height: 200px}
    </style>
</head>
<body>

    <div class="grille">
        <?php foreach ($products as $product): ?>
            <div class="produit">
                <img class="image" src=<?= $product["image"] ?> ><br/>

                <?= $product["name"] ?> : <?= number_format($product["prix"], 2, ",", " ") ?> €<br/>
                <?php
                if ($product["stock"]>0){ ?>
                    <div class="en-stock">
                        En stock !
                    </div>
                <?php
                }
                else{ ?>
                    <div class="rupture">
                        En rupture !
                    </div>
                <?php
                }

                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div>
        <?= count($products) . ' produit(s) affiché(s)' ?>
    </div>





    
</body>
</html>