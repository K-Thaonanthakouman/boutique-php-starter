<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function formatPrice($amount, $currency, $decimals) {
        return number_format($amount, $decimals, ",", " ") . $currency;
    }

    $somme = (rand(0, 100000)/1000);
    $formate = formatPrice($somme, "€", "2");
    echo "Somme non formatée : $somme ; somme formatée : $formate<br/>";


?>
    
</body>
</html>