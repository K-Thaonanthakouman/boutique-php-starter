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

var_dump($_POST["add"]);
var_dump($_POST["name"]);
var_dump($_POST["price"]);
var_dump($_POST["stock"]);
var_dump(!empty($_POST["name"]));
var_dump(!empty($_POST["price"]));
var_dump(!empty($_POST["stock"]));

// Ajout de produits dans la BDD
if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["stock"]))){
    $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
    $stmt->execute([$_POST["name"], $_POST["price"], $_POST["stock"]]);
    header("Location: admin-produits.php");
    exit;
}

// Modification de produit dans la BDD
if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST["id"]) && !empty($_POST["new_name"]) && !empty($_POST["new_price"]) && !empty($_POST["new_stock"]))){
    $id_recup = $_POST["id"];

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = $id_recup");
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($id_recup == $ligne["id"]){
        $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->execute([$_POST["new_name"], $_POST["new_price"], $_POST["new_stock"], $ligne["id"]]);
        header("Location: admin-produits.php");
        exit;
    }

}


// Suppression de produit dans la BDD
if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);
    header("Location: admin-produits.php");
    exit;
}

// Affichage des produits dans la BDD
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($product as $item){ ?>
    <p>Produit n°<?= $item["id"] ?> : <?= $item["name"] ?>, <?= $item["price"] ?> €, <?= $item["stock"] ?> unité(s) en stock.</p><?php
}

var_dump($product);
?>

<form method="POST" action="">
    <input type="text" name="name">
    <input type="text" name="price">
    <input type="text" name="stock">
    <button type="submit" name="add">Ajouter</button>
</form>

<form method="POST" action="">
    <input type="text" name="id">
    <input type="text" name="new_name">
    <input type="text" name="new_price">
    <input type="text" name="new_stock">
    <button type="submit" name="update">Modifier</button>
</form>

<form method="GET" action="">
    <input type="text" name="delete">
    <button type="submit" name="b_delete">Supprimer</button>
</form>





    
</body>
</html>