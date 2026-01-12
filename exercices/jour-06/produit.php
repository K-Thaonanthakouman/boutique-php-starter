<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $products = [
        1 => ["name" => "Ramen", "price" => 6],
        2 => ["name" => "Maki", "price" => 10],
        3 => ["name" => "Sushi", "price" => 18],
        4 => ["name" => "Onigiri", "price" => 8],
        5 => ["name" => "Mochi", "price" => 12],
    ];

    if (isset($_GET["id"])){
        
        if ($products[$_GET["id"]] !== NULL){
            $id = $_GET["id"];
            echo 'Voici le produit sélectionné : ' . $products[$id]["name"] . ', ' . $products[$id]["price"] . '€.<br/>';
        }
        else if(($_GET["id" === NULL]) || ($products[$id] === NULL)){
            echo "Aucun produit sélectionné.<br/>";
        }
    }
    else{
        echo "Aucun produit sélectionné.";
    }


?>
    
</body>
</html>