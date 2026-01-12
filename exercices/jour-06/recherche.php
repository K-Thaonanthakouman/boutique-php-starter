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
        6 => ["name" => "Tonkatsu", "price" => 20],
        7 => ["name" => "Udon", "price" => 7],
        8 => ["name" => "Sashimi", "price" => 14],
        9 => ["name" => "Tsukune", "price" => 14],
        10 => ["name" => "Dorayaki", "price" => 9],
    ];


?>

<form method="GET" action="recherche.php">
    <input type="text" name="search">
    <button type="submit">Chercher</button>
</form>

<?php

    $search = htmlspecialchars($_GET["search"], ENT_QUOTES, "UTF-8");
    $results = [];
    foreach ($products as $product){
        if (stripos($product["name"], $search) !== false){
            $results[] = $product["name"];
        }
    }
    
    if (empty($results) != true){
        foreach ($results as $result){
            echo $result . '<br/>';
        }
    }
    else{
        echo "Aucun résultat pour la recherche $search.";
    }

    var_dump($search);
    var_dump($results);



?>
    
</body>
</html>