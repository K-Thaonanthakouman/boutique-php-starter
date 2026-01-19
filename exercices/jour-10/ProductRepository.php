<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

class Product
{
    public function __construct(private int $id, private string $name, private string $description, private float $prix, private int $stock, private string $categorie)
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
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

class ProductRepository
{
    public function __construct(private PDO $pdo) {}
    
    // READ - Un seul
    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        return $data ? $this->hydrate($data) : null;
    }

    // READ - Tous
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Hydratation : tableau → objet
    private function hydrate(array $data): Product
    {
        return new Product(
            id: (int) $data['id'],
            name: (string) $data['name'],
            description: (string) $data['description'],
            prix: (float) $data['price'],
            stock: (int) $data['stock'],
            categorie: (string) $data['category'],
        );
    }

    // CREATE
    public function save(Product $product): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
        $stmt->execute([
            $product->getName(),
            $product->getPrix(),
            $product->getStock()
        ]);
    }
    
    // UPDATE
    public function update(Product $product): void
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category = ? WHERE id = ?");
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrix(),
            $product->getStock(),
            $product->getCategorie(),
            $product->getId()
        ]);
    }
    
    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }


    public function findByCategory(int $lieustockId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE lieu_stock_id = ?"
        );
        $stmt->execute([$lieustockId]);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
    
    public function findInStock(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products WHERE stock > 0"
        );
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function findByPriceRange(float $min, float $max): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products WHERE price > $min AND price < $max"
        );
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
    
    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE name LIKE ?"
        );
        $stmt->execute(["%$term%"]);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
}

class LieuStockRepository
{
    public function __construct(private PDO $pdo) {}
    
    // READ - Un seul
    public function find(int $id): string
    {
        $stmt = $this->pdo->prepare("SELECT * FROM lieu_stock WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        return $data ? $data["nom"] : null;
    }

    // READ - Tous
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM lieu_stock");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    // CREATE
    public function save($nom): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO lieu_stock (nom) VALUES (?)");
        $stmt->execute([$nom]);
    }
    
    // UPDATE
    public function update($lieustock, $id): void
    {
        $stmt = $this->pdo->prepare("UPDATE lieu_stock SET nom = ? WHERE id = ?");
        $stmt->execute([
            $lieustock,
            $id,
            ]);
    }
    
    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM lieu_stock WHERE id = ?");
        $stmt->execute([$id]);
    }


    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->nom;
    }

    public function findWithProducts(): array
    {

    }
}

?>
    
</body>
</html>