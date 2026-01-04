# 🔗 Récapitulatif des Intégrations au Projet — Formation PHP 14 jours

Ce document rassemble toutes les parties "Intégration au projet" de chaque journée.
L'objectif est de construire progressivement une boutique e-commerce fonctionnelle.

---

## 📅 Jour 0 — Initialisation

**Objectif :** Avoir le projet starter fonctionnel avec Git initialisé.

### Actions :
1. Cloner le starter : `git clone https://github.com/[username]/formation-php-14j.git`
2. Ou créer la structure manuellement :
```bash
mkdir -p formation-php/{starter-project/{public,app,views,config},exercices}
```

### Structure du projet :
```
starter-project/
├── public/              # Point d'entrée (accessible au navigateur)
│   ├── index.php        # Page d'accueil
│   ├── catalogue.php    # Liste des produits (Jour 2-3)
│   ├── produit.php      # Détail produit (Jour 4)
│   └── css/
│       └── style.css
├── app/                 # Code PHP (non accessible directement)
│   ├── data.php         # Données produits (Jour 1-7)
│   └── helpers.php      # Fonctions utilitaires (Jour 5+)
├── views/               # Templates HTML/PHP (Jour 6+)
│   └── layout.php
├── config/
│   ├── database.php     # Connexion BDD (Jour 7+)
│   └── database.sql     # Script SQL
└── exercices/           # Tes exercices quotidiens
    ├── jour-01/
    ├── jour-02/
    └── ...
```

### Git :
```bash
git init
git add .
git commit -m "Initial commit - Jour 0"
git remote add origin https://github.com/[username]/formation-php-boutique.git
git push -u origin main
```

---

## 📅 Jour 1 — Variables et Types

**Objectif :** Combiner variables, types et calculs dans une fiche produit complète.

### Actions :
1. Créer `exercices/jour-01/fiche-complete.php`
2. Créer une fiche produit complète avec :
   - Nom, description, prix HT, taux TVA, stock
   - Calcul automatique du prix TTC
   - Affichage formaté (2 décimales pour les prix)
   - Un peu de CSS inline ou une classe Bootstrap

3. **Bonus :**
   - Ajouter une variable `$discount` (pourcentage) et calculer le prix remisé
   - Utiliser `number_format()` pour afficher "1 234,56 €"

4. **Intégration au starter-project :**
   - Copier `fiche-complete.php` vers `starter-project/public/produit.php`
   - Vérifier que ça fonctionne : http://localhost:8000/produit.php

---

## 📅 Jour 2 — Tableaux

**Objectif :** Créer un catalogue HTML complet avec des données structurées.

### Actions :
1. Créer `exercices/jour-02/page-catalogue.php`
2. Créer un tableau de 6 produits minimum (données variées)
3. Générer une page HTML qui affiche tous les produits
4. **Pour l'instant, copier-coller le HTML pour chaque produit** (pas de boucle !)

### Structure HTML suggérée :
```html
<div class="produit">
    <h2><?= $products[0]["name"] ?></h2>
    <p class="prix"><?= $products[0]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[0]["stock"] ?></p>
</div>
<!-- Répéter pour chaque produit... -->
```

### Intégration au starter-project :
1. Créer `starter-project/app/data.php` avec le tableau de 6+ produits
2. Dans `starter-project/public/catalogue.php`, inclure ce fichier et afficher les produits :
```php
<?php
// starter-project/public/catalogue.php
require_once __DIR__ . '/../app/data.php';
// $products est maintenant disponible
?>
<!DOCTYPE html>
<!-- ... affiche les produits ... -->
```

---

## 📅 Jour 3 — Boucles

**Objectif :** Générer un vrai catalogue dynamique avec des boucles.

### Actions :
1. Créer `exercices/jour-03/catalogue.php`
2. Créer un tableau d'au moins 8 produits avec : nom, prix, stock, image (URL placeholder)
3. Générer une grille de produits en HTML/CSS avec `foreach`
4. Pour chaque produit :
   - Afficher l'image
   - Afficher le nom
   - Afficher le prix formaté (2 décimales)
   - Afficher "En stock" ou "Rupture" selon le stock

### Structure suggérée :
```php
<?php
$products = [/* ... */];
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .grille { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .produit { border: 1px solid #ddd; padding: 15px; }
        .rupture { color: red; }
        .en-stock { color: green; }
    </style>
</head>
<body>
    <div class="grille">
        <?php foreach ($products as $product): ?>
            <div class="produit">
                <!-- Code ici -->
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
```

### Bonus :
- Utiliser des images placeholder : `https://via.placeholder.com/200x200`
- Ajouter un compteur "X produits affichés"
- Ajouter une classe CSS différente selon le stock (rupture en rouge)

### Intégration au starter-project :
1. Ouvrir `starter-project/app/data.php` et s'assurer d'avoir 8+ produits
2. Modifier `starter-project/public/catalogue.php` pour utiliser `foreach`
3. Supprimer tout le code HTML répétitif — une seule boucle suffit maintenant !

**Transformation :**
```php
// Avant (Jour 2) :
<div><?= $products[0]["nom"] ?></div>
<div><?= $products[1]["nom"] ?></div>
<div><?= $products[2]["nom"] ?></div>

// Après (Jour 3) :
<?php foreach ($products as $product): ?>
    <div><?= $product["nom"] ?></div>
<?php endforeach; ?>
```

---

## 📅 Jour 4 — Conditions

**Objectif :** Enrichir le catalogue avec des badges et statistiques conditionnels.

### Actions :
1. Créer `exercices/jour-04/catalogue-badges.php`
2. Reprendre le catalogue du jour 3
3. Ajouter pour chaque produit :
   - Badge "NOUVEAU" si `nouveau === true`
   - Badge "PROMO -X%" si `remise > 0`
   - Badge "DERNIERS" si `stock < 5 && stock > 0`
   - Texte "RUPTURE" en rouge si `stock === 0`
   - Bouton "Ajouter au panier" actif/désactivé selon le stock

4. Ajouter des stats en haut de page :
   - Nombre de produits en stock
   - Nombre de produits en promo
   - Nombre de ruptures

### Structure suggérée :
```php
<?php
$products = [
    [
        "nom" => "T-shirt",
        "prix" => 29.99,
        "stock" => 3,
        "new" => true,
        "discount" => 0
    ],
    [
        "nom" => "Jean",
        "prix" => 89.99,
        "stock" => 0,
        "new" => false,
        "discount" => 20
    ],
    // ...
];

// Compteurs pour les stats
$inStock = 0;
$onSale = 0;
$outOfStock = 0;

foreach ($products as $product) {
    if ($product["stock"] > 0) $inStock++;
    // etc.
}
?>
```

### Intégration au starter-project :
1. Modifier `starter-project/app/data.php` : ajouter les champs `nouveau`, `remise`, `categorie`
2. Modifier `starter-project/public/catalogue.php` pour afficher les badges
3. Ajouter une section stats en haut de la page

---

## 📅 Jour 5 — Fonctions

**Objectif :** Créer une bibliothèque complète de fonctions helpers pour le projet e-commerce.

### Actions :
1. Créer `exercices/jour-05/ecommerce-helpers.php` avec ces fonctions :

**Fonctions de calcul :**
- `calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float`
- `calculateDiscount(float $price, float $percentage): float`
- `calculateTotal(array $cart): float` (cart = tableau de prix)

**Fonctions de formatage :**
- `formatPrice(float $amount): string` → "1 234,50 €"
- `formatDate(string $date): string` → "15 janvier 2024"

**Fonctions d'affichage :**
- `displayStockStatus(int $stock): string` → HTML coloré
- `displayBadges(array $product): string` → tous les badges applicables

**Fonctions de validation :**
- `validateEmail(string $email): bool`
- `validatePrice(mixed $price): bool` → true si nombre positif

**Fonction de debug :**
- `dump_and_die(mixed ...$vars): void` → Affiche et arrête l'exécution

2. Créer une page de test qui démontre chaque fonction

### Intégration au starter-project :
1. Créer `starter-project/app/helpers.php` avec les meilleures fonctions
2. Modifier `starter-project/public/catalogue.php` :
   - Inclure helpers.php en haut
   - Remplacer le code répétitif par des appels de fonctions

**Transformation :**
```php
// Avant :
<p class="prix"><?= number_format($product["prix"] * 1.2, 2) ?> €</p>
<span class="<?= $product["stock"] > 0 ? "en-stock" : "rupture" ?>">
    <?= $product["stock"] > 0 ? "En stock" : "Rupture" ?>
</span>

// Après :
<p class="prix"><?= formatPrice(calculateIncludingTax($product["prix"])) ?></p>
<?= displayStockStatus($product["stock"]) ?>
```

---

## 📅 Jour 6 — Formulaires GET/POST

**Objectif :** Système de recherche et filtrage avancé pour le catalogue.

### Actions :
1. Créer `exercices/jour-06/catalogue-complet.php`
2. Barre latérale avec :
   - Recherche texte
   - Filtres catégories (checkboxes multiples)
   - Slider/inputs prix min-max
   - Tri (prix croissant, décroissant, nom A-Z, Z-A)
   - Pagination (10 produits par page)
3. Zone principale : grille de produits filtrés
4. Compteur : "X produits trouvés"

### Structure suggérée :
```php
<?php
$products = [...]; // 30+ produits

// Récupération des filtres
$search = $_GET["q"] ?? "";
$categories = $_GET["category"] ?? [];
$priceMin = $_GET["price_min"] ?? 0;
$priceMax = $_GET["price_max"] ?? PHP_INT_MAX;
$sort = $_GET["sort"] ?? "name_asc";
$page = $_GET["page"] ?? 1;

// Filtrage
$results = array_filter($products, function($p) use (...) {
    // Conditions de filtrage
});

// Tri
usort($results, function($a, $b) use ($sort) {
    // Logique de tri
});

// Pagination
$perPage = 10;
$total = count($results);
$pages = ceil($total / $perPage);
$results = array_slice($results, ($page - 1) * $perPage, $perPage);
?>
```

### Intégration au starter-project :
1. Ajouter une barre de recherche dans `starter-project/public/catalogue.php`
2. Ajouter des filtres par catégorie
3. Créer `starter-project/public/produit.php` qui affiche un produit par ID

**URLs qui fonctionnent maintenant :**
- `/catalogue.php` → tous les produits
- `/catalogue.php?q=shirt` → recherche
- `/catalogue.php?category=vetements` → filtre
- `/produit.php?id=3` → détail produit

---

## 📅 Jour 7 — Sessions et MySQL

**Objectif :** Combiner sessions et base de données pour un panier persistant.

### Actions :
1. Créer `exercices/jour-07/catalogue-panier.php` :
   - Lister les produits depuis la BDD
   - Bouton "Ajouter au panier" (formulaire POST avec product_id)

2. Le panier est stocké en session :
```php
$_SESSION["cart"] = [
    1 => ["quantity" => 2],  // product_id => quantity
    3 => ["quantity" => 1]
];
```

3. Créer `exercices/jour-07/panier.php` :
   - Récupérer les IDs des produits du panier
   - Faire un SELECT pour obtenir les détails (name, price)
   - Afficher : nom, prix unitaire, quantité, sous-total
   - Calculer le total général

4. Fonctionnalités :
   - Modifier la quantité (formulaire avec input number)
   - Supprimer un article
   - Vider le panier
   - Compteur dans le header : "Panier (X articles)"

### Structure du panier suggérée :
```php
<?php
// Ajouter au panier
if (isset($_POST["add_to_cart"])) {
    $productId = (int)$_POST["product_id"];
    if (!isset($_SESSION["cart"][$productId])) {
        $_SESSION["cart"][$productId] = ["quantity" => 0];
    }
    $_SESSION["cart"][$productId]["quantity"]++;
}

// Dans panier.php
$cartIds = array_keys($_SESSION["cart"] ?? []);
if (!empty($cartIds)) {
    $placeholders = str_repeat('?,', count($cartIds) - 1) . '?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($cartIds);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
```

### Bonus :
- Badge avec le nombre d'articles sur toutes les pages
- Empêcher d'ajouter plus que le stock disponible
- Message flash "Produit ajouté au panier !"

### Intégration au starter-project :
1. Créer `starter-project/config/database.php` avec la connexion PDO
2. Créer la table `produits` et importer les données
3. Modifier le catalogue pour lire depuis la BDD
4. Ajouter un panier en session

---

## 📅 Jour 8 — POO : Classes et Objets

**Objectif :** Créer des entités complètes pour le projet e-commerce.

### Actions :
1. Créer le dossier `exercices/jour-08/entities/`
2. Créer ces classes :
   - `Product.php` (complet avec toutes les méthodes)
   - `Category.php`
   - `User.php` (nom, email, password hashé, dateInscription)
3. Créer `exercices/jour-08/test.php` qui :
   - Instancie des objets de chaque classe
   - Affiche une page HTML avec les données

### Intégration au starter-project :
1. Créer `starter-project/app/Entity/Product.php`
2. Modifier le catalogue pour utiliser des objets Product au lieu de tableaux
3. Comparer la lisibilité du code avant/après

**Transformation :**
```php
// Avant :
echo $product["nom"];
$includingTax = $product["prix"] * 1.2;

// Après :
echo $product->getName();
$includingTax = $product->getPriceIncludingTax();
```

---

## 📅 Jour 9 — POO : Interactions entre objets

**Objectif :** Créer un système d'interactions complet entre objets.

### Actions :
Créer un système avec :
- `Product`, `Category`
- `CartItem`, `Cart`
- `User`, `Address`
- `Order`

Page de test qui :
1. Crée des produits et catégories
2. Crée un utilisateur avec adresse
3. Remplit un panier
4. Crée une commande
5. Affiche le récapitulatif

### Intégration au starter-project :
1. Créer toutes les entités dans `starter-project/app/Entity/`
2. Modifier le panier session pour utiliser la classe Cart
3. Sérialisation : `$_SESSION["cart"] = serialize($cart)`
4. Désérialisation : `$cart = unserialize($_SESSION["cart"])`

---

## 📅 Jour 10 — Repository Pattern

**Objectif :** Créer une interface d'administration complète avec le pattern Repository.

### Actions :
Créer une interface d'administration complète :
- Liste des produits (tableau)
- Bouton "Ajouter" → formulaire
- Bouton "Modifier" sur chaque ligne
- Bouton "Supprimer" avec confirmation
- Tout passe par ProductRepository

### Intégration au starter-project :
1. Créer `starter-project/app/Repository/ProductRepository.php`
2. Créer `starter-project/app/Repository/CategoryRepository.php`
3. Créer `starter-project/config/database.php` avec la classe Database
4. Modifier le catalogue pour utiliser le Repository

### Structure :
```
app/
├── Entity/
│   ├── Product.php
│   └── Category.php
├── Repository/
│   ├── ProductRepository.php
│   └── CategoryRepository.php
config/
└── database.php
```

---

## 📅 Jour 11 — MVC : Partie 1 (Routeur et Controllers)

**Objectif :** Réorganiser le projet selon l'architecture MVC complète.

### Actions :
Réorganiser le projet avec cette structure :

```
app/
├── Controller/
│   ├── HomeController.php
│   ├── ProductController.php
│   └── CartController.php
├── Entity/
├── Repository/
└── Router.php
config/
├── database.php
└── routes.php
public/
└── index.php
views/
├── home/
│   └── index.php
├── products/
│   ├── index.php
│   └── show.php
├── cart/
│   └── index.php
└── layout.php
```

### Intégration au starter-project :
1. Restructurer `starter-project/` selon le schéma MVC
2. Créer le Router et les Controllers
3. Migrer les pages existantes vers des actions de Controller
4. Vérifier que tout fonctionne encore !

---

## 📅 Jour 12 — MVC : Partie 2 (Helpers, Layout, Namespaces)

**Objectif :** Finaliser l'application MVC avec namespaces, autoloading et helpers.

### Actions :
Finaliser l'application MVC avec :

### Structure finale :
```
app/
├── Controller/
│   ├── Controller.php (base)
│   ├── HomeController.php
│   ├── ProductController.php
│   ├── CartController.php
│   └── AuthController.php
├── Entity/
├── Repository/
├── Router.php
└── helpers.php
config/
├── database.php
└── routes.php
public/
├── index.php
└── css/
views/
├── layout.php
├── home/
├── products/
├── cart/
└── auth/
composer.json
```

### Fonctionnalités :
- Page d'accueil
- Catalogue avec recherche
- Détail produit
- Panier (session)
- Inscription/Connexion simple
- Messages flash partout

### Intégration au starter-project :
1. Ajouter les namespaces
2. Configurer Composer
3. Créer le layout
4. Implémenter tous les helpers
5. Vérifier que l'application fonctionne de bout en bout

---

## 📅 Jour 13 — Outils de Qualité

**Objectif :** Mettre en place un pipeline qualité complet avec PHPStan, Pint et Rector.

### Actions :
Créer des scripts npm/composer pour automatiser :

```json
{
    "scripts": {
        "lint": "vendor/bin/pint --test",
        "fix": "vendor/bin/pint",
        "analyse": "vendor/bin/phpstan analyse",
        "refactor": "vendor/bin/rector --dry-run",
        "quality": [
            "@lint",
            "@analyse"
        ]
    }
}
```

Usage :
```bash
composer quality  # Vérifie tout
composer fix      # Corrige le formatage
```

### Intégration au starter-project :
1. Installer les 3 outils sur le projet
2. Configurer chacun
3. Lancer une première analyse complète
4. Corriger toutes les erreurs
5. Ajouter les scripts Composer

---

## 📅 Jour 14 — IA et Workflow Moderne

**Objectif :** Créer une nouvelle fonctionnalité complète avec l'IA et les outils de qualité.

### Actions :
Créer une nouvelle fonctionnalité de A à Z avec l'IA et les outils de Code Quality :

1. **Brief :** Système de reviews produit (note 1-5, commentaire, auteur)
2. **Générer** la classe Review avec Copilot
3. **Vérifier** avec PHPStan (niveau 5)
4. **Moderniser** avec Rector
5. **Formater** avec Pint
6. **Générer** ReviewRepository
7. **Intégrer** dans le projet MVC

### Intégration au starter-project :
1. Configurer le workflow complet sur le projet
2. Ajouter un hook pre-commit qui lance `composer check`
3. Documenter le setup dans le README

---

## 🎯 Récapitulatif des fichiers créés/modifiés

### Structure finale du projet :

```
starter-project/
├── public/
│   ├── index.php              # Front controller (J11)
│   └── css/
│       └── style.css
├── app/
│   ├── Controller/            # (J11-12)
│   │   ├── Controller.php
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   ├── CartController.php
│   │   └── AuthController.php
│   ├── Entity/                # (J8-9)
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── User.php
│   │   ├── Cart.php
│   │   ├── CartItem.php
│   │   └── Order.php
│   ├── Repository/            # (J10)
│   │   ├── ProductRepository.php
│   │   ├── CategoryRepository.php
│   │   └── UserRepository.php
│   ├── Router.php             # (J11)
│   └── helpers.php            # (J5, J12)
├── views/                     # (J11-12)
│   ├── layout.php
│   ├── home/
│   │   └── index.php
│   ├── products/
│   │   ├── index.php
│   │   └── show.php
│   ├── cart/
│   │   └── index.php
│   └── auth/
│       ├── login.php
│       └── register.php
├── config/
│   ├── database.php           # (J7, J10)
│   ├── routes.php             # (J11)
│   └── database.sql
├── composer.json              # (J12-13)
├── phpstan.neon               # (J13)
├── pint.json                  # (J13)
├── rector.php                 # (J13)
└── README.md
```

---

## ✅ Checklist de progression

- [ ] **J0** : Environnement + Git initialisé
- [ ] **J1** : Fiche produit avec variables
- [ ] **J2** : Catalogue avec tableau de produits (copier-coller)
- [ ] **J3** : Catalogue dynamique avec foreach
- [ ] **J4** : Badges conditionnels + stats
- [ ] **J5** : Fichier helpers.php
- [ ] **J6** : Recherche + filtres GET
- [ ] **J7** : Panier session + BDD
- [ ] **J8** : Entités POO
- [ ] **J9** : Cart/CartItem objets
- [ ] **J10** : Repositories CRUD
- [ ] **J11** : Router + Controllers
- [ ] **J12** : Layout + Namespaces + App complète
- [ ] **J13** : PHPStan/Pint/Rector configurés
- [ ] **J14** : Feature Review avec workflow IA
