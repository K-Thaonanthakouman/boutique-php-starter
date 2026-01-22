<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$produits = [
    ["name" => "BMW", "price" => 25000, "category" => "allemande", "inStock" => true],
    ["name" => "Mercedes", "price" => 35000, "category" => "allemande", "inStock" => false],
    ["name" => "Ferrari", "price" => 500000, "category" => "italienne", "inStock" => false],
    ["name" => "Lamborghini", "price" => 150000, "category" => "italienne", "inStock" => true],
    ["name" => "Renault", "price" => 15000, "category" => "francaise", "inStock" => true],
    ["name" => "Peugeot", "price" => 12000, "category" => "francaise", "inStock" => true],
    ["name" => "Chevrolet", "price" => 29000, "category" => "americaine", "inStock" => true],
    ["name" => "Ford", "price" => 32000, "category" => "americaine", "inStock" => true],
    ["name" => "Chrysler", "price" => 22000, "category" => "americaine", "inStock" => false],
    ["name" => "Honda", "price" => 18000, "category" => "japonaise", "inStock" => true],
    ["name" => "Nissan", "price" => 20000, "category" => "japonaise", "inStock" => true],
    ["name" => "Toyota", "price" => 24000, "category" => "japonaise", "inStock" => true],
    ["name" => "Mazda", "price" => 19000, "category" => "japonaise", "inStock" => false],
    ["name" => "Volvo", "price" => 28000, "category" => "suedoise", "inStock" => true],
    ["name" => "Seat", "price" => 27000, "category" => "espagnole", "inStock" => true],
];

?>

<form method="GET" action="catalogue-filtres.php">
    Recherche : <input type="text" name="search"><br/>
<?php
    $search = htmlspecialchars($_GET["search"], ENT_QUOTES, "UTF-8");
    $results = [];
    foreach ($produits as $produit){
        if (stripos($produit["name"], $search) !== false){
            $results[] = $produit["name"];
        }
    }

?>
    <select name="category">
        <option value="defaut">Pays</option>
        <option value="allemande">Allemande</option>
        <option value="italienne">Italienne</option>
        <option value="francaise">Française</option>
        <option value="americaine">Américaine</option>
        <option value="japonaise">Japonaise</option>
        <option value="suedoise">Suédoise</option>
        <option value="espagnole">Espagnole</option>
    </select><br/>
<?php

    $results2 = [];
    foreach ($produits as $produit){
        if ($_GET["category"] == $produit["category"]){
            $results2[] = $produit["name"];
        }
    }
?>
    La somme (en milliers) :
    <input type="number" name="price"><br/>
<?php

    $results3 = [];
    foreach ($produits as $produit){
        if ($_GET["price"] <= ($produit["price"] / 1000)){
            $results3[] = $produit["name"];
        }
    }
    
?>
    <button type="submit">Chercher</button>
</form>

<?php
$final = [];
foreach($results as $res1){
    foreach($results2 as $res2){
        foreach($results3 as $res3){
            if(($res1 == $res2) && ($res1 == $res3) && ($res2 == $res3)){
                $final[] = $res3;
            }
        }
    }
}

if (empty($final) != true){?>
    Votre recherche : <?php
    foreach ($final as $fin){
        ?><?=$fin?> <?php
    }?>
    .<?php
}

else{?>
    Aucun résultat pour votre recherche.<?php
}







    

// var_dump($results);
// var_dump($_GET["category"]);
// var_dump($_GET["price"]);

?>
    
</body>
</html>