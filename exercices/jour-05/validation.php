<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function isInStock($stock){
        if ($stock > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function isOnDiscount($discount){
        if ($discount > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function isNew($dateAdded){
        if (( (time() - strtotime($dateAdded)) / 86400) < 30 ){
            return true;
        }
        else{
            return false;
        }
    }

    function canOrder($stock, $quantity){
        if ($stock >= $quantity){
            return true;
        }
        else{
            return false;
        }
    }

    $stock = rand(0, 10);
    $discount = rand(0, 10);
    $date = "2025-12-11";
    $quantity = rand(1, 10);

    echo "Stock : $stock ; Discount : $discount ; Date : $date ; Quantité : $quantity<br/>";

    if (isInStock($stock) === true){
        echo "Ce produit est disponible.<br/>";
    }
    else{
        echo "Ce produit n'est pas disponible.<br/>";
    }

    if ((isOnDiscount($discount) === true) && (isInStock($stock) === true)){
        echo "Ce produit est en réduction.<br/>";
    }
    else{
        echo "Ce produit n'est pas en réduction.<br/>";
    }

    if (isNew($date) === true){
        echo "Ce produit est nouveau.<br/>";
    }
    else{
        echo "Ce produit n'est pas nouveau.<br/>";
    }

    if (canOrder($stock, $quantity) === true){
        echo "Il y a assez d'exemplaires de ce produit.<br/>";
    }
    else{
        echo "Il n'y a pas assez d'exemplaires de ce produit.<br/>";
    }


?>
    
</body>
</html>