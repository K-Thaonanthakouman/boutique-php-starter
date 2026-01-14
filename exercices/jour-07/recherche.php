<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

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



?>

<form method="GET" action="">
    <input type="text" name="search">
    <button type="submit">Submit !</button>
</form>

<?php

$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(['%' . $_GET["search"] . '%']);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_GET["search"] == false){
}
else if ($result == false){ ?>
    <p>Aucun résultat trouvé.</p> <?php
}
else{ ?>
    <p>Produit trouvé : <?= $result["name"] ?>, <?= $result["price"] ?> €, <?= $result["stock"] ?> unité(s) en stock.</p> <?php
}


var_dump($result);






?>
    
</body>
</html>