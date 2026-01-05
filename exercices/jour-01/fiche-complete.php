<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $name = "T-shirt";
        $description = "T-shirt auto-lavable pour toutes les feignasses de la Terre !";
        $prixHT = 30;
        $tva = 20/100;
        $stock = 84652;
        $prixTTC = number_format($prixHT*$tva+$prixHT, 2, ",", " ");
        echo $prixTTC;
        $discount = 15/100;
        $prix_discount = number_format($prixTTC - ($prixTTC * $discount), 2, ",", " "); ?>
        <br/>
        <?= $prix_discount;


    ?>



</body>
</html>