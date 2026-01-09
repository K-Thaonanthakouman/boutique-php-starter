<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function displayBadge($text, $color){
        echo "<span class=\"badge\" style=\"background: $color\">$text</span><br/>";
    }

    function displayPrice($price, $discount){
        if($discount > 0){
            $newPrice = $price*(1-$discount/100);
            echo "<strike>$price</strike> <strong>$newPrice</strong><br/>";
        }
        else{
            echo "<strong>$price</strong><br/>";
        }
    }

    function displayStock($stock){
        $color = match(true){
            $stock === 0 => "red",
            $stock < 5 => "orange",
            $stock < 10 => "yellow",
            default => "green",
        };
        echo "<span class=\"dispo\" style=\"color: $color\">$stock exemplaire(s) restant(s)</span><br/>";
    }

    $text = "Pas d'quoi casser 3 pattes à un canard";
    $color = "blue";
    displayBadge($text, $color);

    $prix = rand(10, 500);
    $remise = rand(1, 20);
    displayPrice($prix, $remise);

    $quantite = rand (0, 20);
    displayStock($quantite);


?>
    
</body>
</html>