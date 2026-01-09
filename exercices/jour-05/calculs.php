<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function calculateVAT($priceExcludingTax, $rate) {
        return $priceExcludingTax*$rate/100;
    }

    function calculateIncludingTax($priceExcludingTax, $rate) {
        return $priceExcludingTax*(1+$rate/100);
    }

    function calculateDiscount($price, $rateDiscount) {
        return $price*(1-$rateDiscount/100);
    }

    $prix = rand(100, 1000);
    echo "Prix HT : $prix. <br/>";

    $taxe = 20;
    $calcul = calculateVAT($prix, $taxe);
    echo "Montant de la TVA : $calcul.<br/>";

    $prixTTC = calculateIncludingTax($prix, $taxe);
    echo "Prix TTC : $prixTTC.<br/>";

    $remise = 15;
    $calcul = calculateDiscount($prixTTC, $remise);
    echo "Prix après $remise% de remise : $calcul.<br/>";


?>
    
</body>
</html>