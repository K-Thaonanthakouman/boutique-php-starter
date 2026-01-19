<?php

include("ProductRepository.php");

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "✅ Connexion réussie !";
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

// Exercice 1

$productrepository = new ProductRepository($pdo);
$result = $productrepository->find(2);

// Exercice 2

// $product = new Product(11, "Débouche-chiottes", "Tout est dans le nom", 5.99, 458, "Toilettes");
// $productrepository->save($product);
// $productrepository->update($product);
// $productrepository->delete($product->getId());

// Exercice 3
?>
<p>
<?php
$recherche = $productrepository->findByCategory(2);
var_dump($recherche);
?>
</p>

<p>
<?php
$rechercheInStock = $productrepository->findInStock();
var_dump($rechercheInStock);
?>
</p>

<p>
<?php
$rechercheByPriceRange = $productrepository->findByPriceRange(10, 50);
var_dump($rechercheByPriceRange);
?>
</p>

<p>
<?php
$rechercheNom = $productrepository->search("shirt");
var_dump($rechercheNom);
?>
</p>

<p>
<?php
// Exercice 4

$lieu = new LieuStockRepository($pdo);
$find = $lieu->find(2);
var_dump($find);
?>
</p>

<p>
<?php
$findAll = $lieu->findAll();
var_dump($findAll);
?>
</p>

<p>
<?php
// $lieu->save("Saint-Etienne");
// $lieu->update("Toulouse", 6);
// $lieu->delete(6);


?>
</p>