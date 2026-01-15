<?php

class product
{
    public function __construct(int $id, string $name, string $description, float $prix, int $stock, string $categorie)
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
}

$produit = new product(1, "Mario Kart", "Le jeu où Maëva est pas bien forte", 40, 756, "jeux vidéo"); ?>
<p>Prix TTC : <?= $produit->getPriceIncludingTax(); ?>€.</p><?php
$produit->isInStock();
$produit->reduceStock(756);
$produit->isInStock();
$produit->applyDiscount(17.44645);





?>