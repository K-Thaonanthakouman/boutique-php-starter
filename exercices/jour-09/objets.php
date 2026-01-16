<?php

// Exercice 1
?><h3>Exercice 1</h3><?php

class Category
{
    public function __construct(private int $id, private string $name)
    {}
    
    public function getName(): string
    {
        return $this->name;
    }
}

class Product
{
    public function __construct(private int $id, private string $name, private float $price, private Category $category)
    {}

    public function getId() : int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}

$cat1 = new Category(1, "fromage");
$cat2 = new Category(2, "boisson");
$cat3 = new Category(3, "pâtisserie");

$prod1 = new Product(1, "Emmenthal", 5.99, $cat1);
$prod2 = new Product(2, "Baba au rhum", 4.99, $cat3);
$prod3 = new Product(3, "Comté", 6.99, $cat1);
$prod4 = new Product(4, "Bière", 3.99, $cat2);
$prod5 = new Product(5, "Forêt noire", 15.99, $cat3);

$prods = [$prod1, $prod2, $prod3, $prod4, $prod5];

?>
<p>
<?php
foreach ($prods as $prod){ ?>
    <?= $prod->getName() ?> : <?= $prod->getPrice() ?>€, catégorie <?= $prod->getCategory()->getName() ?><br/><?php
}
?>
</p>

<?php

// Exercice 2
?><h3>Exercice 2</h3><?php

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity = 1
    )
    {}
    
    public function getProduct(): Product
    {
        return $this->product;
    }
    
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    public function setQuantity(int $quantity): void
    {
        $this->quantity = max(1, $quantity);
    }
    
    public function getTotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }

    public function incremente(): void
    {
        $this->quantity = $this->quantity +1;
    }

    public function decremente(): void
    {
        $this->quantity = $this->quantity -1;
    }
}
?>
<p>
<?php
$cartElem = new CartItem($prod2, 3);
$cartElem->incremente();
$cartElem->incremente();
$cartElem->decremente();?>
<?= $cartElem->getQuantity()?> unité(s) de l'article <?= $cartElem->getProduct()->getName()?> dans le panier.<br/><?php
$cartElem->setQuantity(48);?>
<?= $cartElem->getQuantity()?> unité(s) de l'article <?= $cartElem->getProduct()->getName()?> dans le panier.<br/>
Prix total pour les <?= $cartElem->getQuantity()?> unité(s) de l'article <?=$cartElem->getProduct()->getName()?> : <?= $cartElem->getTotal();?>€.
</p>

<?php

// Exercice 3
?><h3>Exercice 3</h3><?php

class Cart
{
    private array $items = [];
    
    public function addProduct(Product $product, int $quantity = 1): Cart
    {
        $id = $product->getId();
        
        if (isset($this->items[$id])) {
            // Produit déjà dans le panier → augmenter quantité
            $currentQuantity = $this->items[$id]->getQuantity();
            $this->items[$id]->setQuantity($currentQuantity + $quantity);
            return $this;
        }
        else {
            // Nouveau produit
            $this->items[$id] = new CartItem($product, $quantity);
            return $this;
        }
    }
    
    public function removeProduct(int $productId): Cart
    {
        unset($this->items[$productId]);
        return $this;
    }
    
    public function getItems(): array
    {
        return $this->items;
    }
    
    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }
    
    public function count(): int
    {
        return count($this->items);
    }
    
    public function clear(): void
    {
        $this->items = [];
    }
}

$cart = new Cart;
var_dump($cart);
$cart->addProduct($prod4, 10);
$cart->addProduct($prod2, 8);
$cart->addProduct($prod5, 3);
$cart->addProduct($prod1, 12);
$cart->addProduct($prod5, 2);

foreach($cart->getItems() as $item){ ?>
    <p><?= $item->getProduct()->getName() ?> : <?= $item->getQuantity() ?> unité(s) sélectionnée(s).<br/>
    Prix unitaire : <?= $item->getProduct()->getPrice() ?>€. Prix pour la quantité choisie : <?= ($item->getProduct()->getPrice())*($item->getQuantity()) ?>€.
    </p><?php
} ?>
<p><?= $cart->count() ?> articles différents dans le panier.<br/>
    Total du panier : <?= $cart->getTotal() ?>€.</p>
<?php


$cart->removeProduct(1);

foreach($cart->getItems() as $item){ ?>
    <p><?= $item->getProduct()->getName() ?> : <?= $item->getQuantity() ?> unité(s) sélectionnée(s).<br/>
    Prix unitaire : <?= $item->getProduct()->getPrice() ?>€. Prix pour la quantité choisie : <?= ($item->getProduct()->getPrice())*($item->getQuantity()) ?>€.
    </p><?php
} ?>
<p><?= $cart->count() ?> articles différents dans le panier.<br/>
    Total du panier : <?= $cart->getTotal() ?>€.</p>
<?php

$cart->clear();

foreach($cart->getItems() as $item){ ?>
    <p><?= $item->getProduct()->getName() ?> : <?= $item->getQuantity() ?> unité(s) sélectionnée(s).<br/>
    Prix unitaire : <?= $item->getProduct()->getPrice() ?>€. Prix pour la quantité choisie : <?= ($item->getProduct()->getPrice())*($item->getQuantity()) ?>€.
    </p><?php
} ?>
<p><?= $cart->count() ?> articles différents dans le panier.<br/>
    Total du panier : <?= $cart->getTotal() ?>€.</p>
<?php

$cart->addProduct($prod4, 10);
$cart->addProduct($prod2, 8);
$cart->addProduct($prod5, 3);
$cart->addProduct($prod1, 12);
$cart->addProduct($prod5, 2);


// Exercice 4
?><h3>Exercice 4</h3><?php

class User
{
    public function __construct(
    private string $name,
    private string $email,
    private string $dateInscription,
    private array $adresses = [],
    )
    {}

    public function addAddress(Address $adresse): void
    {
        $this->adresses[] = $adresse;
    }

    public function getAddresses(): array
    {
        return $this->adresses;
    }

    public function getDefaultAddress(): object
    {
        return $this->adresses[0];
    }
}

class Address
{
    public function __construct(
    private string $rue,
    private string $ville,
    private int $codePostal,
    private string $pays,
    )
    {}

    public function getRue(): string
    {
        return $this->rue;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function getCodePostal(): int
    {
        return $this->codePostal;
    }

    public function getPays(): string
    {
        return $this->pays;
    }
}

$pouet = new User("Coin-Coin", "coin@coincompany.com", "02.01.2016");
$adresse1 = new Address("497 Avenue des Cons", "Trifouillis-les-Oies", 12345, "France");
$adresse2 = new Address("123 Boulevard des Abrutis", "Saint-Hilaire-Cusson-la-Valmitte", 42235, "France");
$pouet->addAddress($adresse1);
$pouet->addAddress($adresse2);
$pouet->getAddresses();
$pouet->getDefaultAddress();?>
<p>Adresse par défaut : <?= $pouet->getDefaultAddress()->getRue() ?>, <?= $pouet->getDefaultAddress()->getCodePostal() ?> <?= $pouet->getDefaultAddress()->getVille() ?>, <?=$pouet->getDefaultAddress()->getPays() ?></p><?php

// Exercice 5
?><h3>Exercice 5</h3><?php

class Order
{
    private array $items;

    public function __construct(
        private int $id,
        private User $user,    
        private string $date,
        private string $statut,
        Cart $cart,
    )
    {
        $this->items = $cart->getItems();
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function getItemCount(): int
    {
        $count = 0;
        foreach($this->items as $item) {
            $count += $item->getQuantity();
        }
        return $count;
    }

    public function setStatut(): string
    {
        return $this->statut;
    }
}

$order1 = new Order(1, $pouet, date("d.m.Y"), "en cours", $cart);

var_dump($order1->getTotal());
var_dump($order1->getItemCount());
var_dump($order1->setStatut());



// Exercice 6
?><h3>Exercice 6</h3>

<p>
<?php
foreach($cart->getItems() as $item){ ?>
    <?= $item->getProduct()->getName(); ?> : <?=$item->getQuantity()?> unité(s).<br/><?php
}?>
</p>

<?php

$cart->addProduct($prod3, 4)->addProduct($prod4, 46)->removeProduct(1);

foreach($cart->getItems() as $item){ ?>
    <?= $item->getProduct()->getName(); ?> : <?=$item->getQuantity()?> unité(s).<br/><?php
}?>
</p>

