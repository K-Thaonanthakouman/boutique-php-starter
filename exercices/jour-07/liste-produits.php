<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

// include("../../app/data.php");

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "✅ Connexion réussie !";
}
catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

$stmt = $pdo->prepare("SELECT * FROM products");
// $stmt->execute([$_GET["id"]]);
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($product as $item){ ?>
    <p><?= $item["name"] ?> : <?= $item["price"] ?> €, <?= $item["stock"] ?> unité(s) en stock.</p> <?php
}


var_dump($product);

?>

</body>
</html>