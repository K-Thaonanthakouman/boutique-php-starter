<?php

// Exercice 4

class Product
{
    public function __construct(public int $id, public string $name, public string $description, public float $prix, public int $stock, public string $categorie)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->categorie = $categorie;
    }

    public function getPriceIncludingTax(float $tva = 20) : float
    {
        $ttc = round(($this->prix * (1 + $tva / 100)), 2);
        return $ttc;
    }

    public function isInStock() : bool
    {
        if ($this->stock > 0){ ?>
        <p>Oui, il y a du stock.</p><?php
            return true;
        }
        else{ ?>
        <p>Non, il n'y a plus de stock.</p><?php
            return false;
        }
    }

    public function reduceStock(int $quantity) : int
    {
        if ($this->stock >= $quantity){
            $this->stock = $this->stock - $quantity; ?>
            <p>Vous souhaitez enlever <?= $quantity ?> unité(s) du stock. Il reste <?= $this->stock ?> unité(s) en stock.</p><?php
            return $this->stock;
        }
        else{ ?>
            <p>Il n'y a pas assez d'unité(s) en stock. Il ne reste que <?= $this->stock ?> en stock alors que vous demandez <?= $quantity ?> unité(s).</p><?php
            return $this->stock;
        }
    }

    public function applyDiscount(float $pourcentage) : float
    {
        $discount = round(($this->getPriceIncludingTax() * (1 - $pourcentage / 100)), 2); ?>
        <p>Prix TTC après <?= $pourcentage ?>% de remise : <?= $discount ?>€.</p><?php
        return $discount;
    }

    public function getSlug(string $chainebrute) : string
    {
        $chaineslug = strtr(strtolower($chainebrute), " ", "-");
        return $chaineslug;
    }
}

$produit = new Product(0, "Mario Kart", "Le jeu où Maëva est pas bien forte", 40, 756, "jeux vidéo"); ?>
<p>Prix TTC : <?= $produit->getPriceIncludingTax(); ?>€.</p><?php
$produit->isInStock();
$produit->reduceStock(756);
$produit->isInStock();
$produit->applyDiscount(17.44645);



// Exercice 5

$produits = [];
$produit1 = new Product(1, "Chrono Trigger", "Le meilleur jeu de l'univers", 29.90, 548, "jeux vidéo");
$produit2 = new Product(2, "Final Fantasy VI", "Le second meilleur jeu de l'univers", 34.99, 612, "jeux vidéo");
$produit3 = new Product(3, "World of Warcraft", "Le jeu qui vous enlève votre vie sociale", 39.99, 396, "jeux vidéo");
$produit4 = new Product(4, "Zelda Breath of the Wild", "Le jeu où vous partez vous perdre dans la pampa", 49.99, 942, "jeux vidéo");
$produit5 = new Product(5, "Factorio", "Le jeu où vous travaillez encore après votre journée de travail irl", 19.99, 852, "jeux vidéo");

$produits = [$produit1, $produit2, $produit3, $produit4, $produit5];
?>
    <p>
<?php
    foreach($produits as $produit){ ?>
        Produit n°<?=$produit->id?> : <?=$produit->name?>, <?=$produit->description?>. Prix : <?=$produit->prix?>, <?=$produit->stock?> exemplaires en stock. Catégorie : <?=$produit->categorie?>.<br/><?php
        $valeur_cat = $valeur_cat + $produit->prix;
        $stock_total = $stock_total + $produit->stock;
    }
?>
    </p>
    <p>
    La valeur unitaire de tout le catalogue est de <?=$valeur_cat?>€.<br/>
    Le stock de tout le catalogue est de <?=$stock_total?> unités.
    </p>

<?php

// Exercice 6
    ?>
    
    <?php
    foreach($produits as $produit){ ?>
        <p><?=$produit->name?> en version slug : <?=$produit->getSlug($produit->name)?>.<br/>
        La description du jeu en version slug : <?=$produit->getSlug($produit->description)?>.</p><?php
    }
    ?>
    

<?php

var_dump($produits);



?>