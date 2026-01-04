# 🤖 Instructions Claude Code — Starter Frontend PHP

Copie ces instructions dans Claude Code pour transformer le repo `cours-php-moderne` en starter frontend.

---

## 📋 COMMANDE À EXÉCUTER

```
Clone le repo https://github.com/matthieuLabaune/cours-php-moderne et transforme-le en un starter frontend HTML/CSS pour une formation PHP de 14 jours.

CONTEXTE :
- C'est une formation PHP où les apprenants vont progressivement "PHPiser" du HTML statique
- Les fichiers HTML contiennent des commentaires <!-- JOUR X : ... --> indiquant ce qu'il faudra modifier
- Tous les composants visuels sont prêts, seule la logique PHP est à ajouter

STRUCTURE À CRÉER :
```
cours-php-moderne/
├── public/
│   ├── index.html              # Page d'accueil avec hero, stats, produits vedettes
│   ├── catalogue.html          # Grille 8 produits, filtres sidebar, recherche, pagination
│   ├── produit.html            # Page détail avec galerie, description, bouton panier
│   ├── panier.html             # Tableau panier, quantités, récapitulatif, total
│   ├── connexion.html          # Formulaire login
│   ├── inscription.html        # Formulaire register avec validation
│   ├── contact.html            # Formulaire contact
│   └── css/
│       └── style.css           # CSS complet avec variables, composants, responsive
├── app/
│   └── .gitkeep
├── views/
│   └── .gitkeep
├── config/
│   ├── .gitkeep
│   └── database.sql            # Script SQL pour les tables products, users, orders
├── exercices/
│   ├── jour-01/ ... jour-14/   # Un dossier par jour avec .gitkeep
├── docs/
│   └── PROGRESSION.md          # Guide de progression jour par jour
├── .gitignore
├── composer.json               # Prêt pour le Jour 12+
└── README.md                   # Instructions d'installation et utilisation
```

COMPOSANTS HTML/CSS REQUIS :

1. HEADER (commun à toutes les pages) :
   - Logo "MaBoutique" cliquable
   - Navigation : Accueil, Catalogue, Contact
   - Bouton Connexion
   - Icône panier avec badge nombre d'articles
   - Commentaire : <!-- JOUR 12 : Extraire dans views/layout.php -->

2. FOOTER (commun) :
   - 4 colonnes : À propos, Navigation, Compte, Formation
   - Copyright avec année
   - Commentaire : <!-- JOUR 1 : Remplacer 2024 par <?= date('Y') ?> -->

3. CARD PRODUIT :
   - Image avec badges (Nouveau, Promo -X%, Derniers, Rupture)
   - Catégorie, Titre cliquable, Prix (actuel + barré si promo)
   - Statut stock coloré (vert/orange/rouge)
   - Bouton "Ajouter au panier" (désactivé si rupture)
   - Commentaires :
     <!-- JOUR 3 : Générer avec foreach -->
     <!-- JOUR 4 : Badges conditionnels -->
     <!-- JOUR 7 : Formulaire POST ajout panier -->

4. GRILLE PRODUITS :
   - CSS Grid responsive 4 colonnes → 1 colonne
   - 8 produits variés :
     * 2 nouveaux, 3 promos, 2 ruptures, 1 stock faible
     * 3 catégories : Vêtements, Chaussures, Accessoires

5. FILTRES SIDEBAR :
   - Recherche texte
   - Checkboxes catégories
   - Prix min/max
   - Checkbox "En stock uniquement"
   - Bouton "Appliquer"
   - Commentaire : <!-- JOUR 6 : Formulaire GET avec conservation valeurs -->

6. PAGE DÉTAIL PRODUIT :
   - Grande image + miniatures
   - Titre, catégorie, prix, description
   - Sélecteur quantité
   - Bouton panier + Continuer achats
   - Breadcrumb
   - Commentaire : <!-- JOUR 6 : Récupérer produit via $_GET['id'] -->

7. TABLEAU PANIER :
   - Colonnes : Produit (image+nom), Prix, Quantité (+-), Total, Supprimer
   - 2 produits exemple
   - Boutons : Continuer achats, Vider panier
   - Commentaire : <!-- JOUR 7 : foreach sur $_SESSION['cart'] -->

8. RÉCAPITULATIF PANIER :
   - Sous-total, TVA 20%, Livraison, Total
   - Bouton "Procéder au paiement"
   - Commentaire : <!-- JOUR 5 : Calculs avec helpers -->

9. FORMULAIRES AUTH :
   - Login : email, password, remember me
   - Register : username, email, password, confirm, terms
   - Validation HTML5 (required, minlength, type)
   - Commentaires : <!-- JOUR 6 : Validation PHP + préremplissage -->

10. STATISTIQUES :
    - 4 boxes : Produits, En stock, Promos, Catégories
    - Commentaire : <!-- JOUR 4 : Calculer avec conditions -->

11. ALERTES/FLASH :
    - 4 styles : success (vert), error (rouge), warning (orange), info (bleu)
    - Commentaire : <!-- JOUR 7 : Afficher $_SESSION['flash'] -->

12. PAGINATION :
    - Boutons < 1 2 3 >
    - État actif et désactivé
    - Commentaire : <!-- JOUR 6 : Générer dynamiquement -->

CSS REQUIS :
- Variables CSS pour couleurs, espacements, typographie
- Classes utilitaires : .btn, .btn--primary, .btn--secondary, .btn--danger, etc.
- Composants : .card, .badge, .alert, .form-input, .form-group
- Layout : .container, .header, .footer, .products-grid, .catalog-layout
- Responsive : breakpoints 1024px, 768px, 480px
- Animations subtiles : hover sur cards, transitions boutons

DONNÉES PRODUITS (8 produits) :
1. T-shirt Premium Bio - 35.99€ - Vêtements - 45 stock - NOUVEAU
2. Sneakers Urban - 79.99€ (ancien 99.99€) - Chaussures - 3 stock - PROMO -20% + DERNIERS
3. Casquette Vintage - 24.99€ - Accessoires - 28 stock
4. Jean Slim Stretch - 55.99€ (ancien 79.99€) - Vêtements - 20 stock - PROMO -30%
5. Sac à dos Urbain - 59.99€ - Accessoires - 12 stock - NOUVEAU
6. Montre Classic - 89.99€ - Accessoires - 0 stock - RUPTURE
7. Pull Col Roulé - 49.99€ - Vêtements - 15 stock
8. Ceinture Cuir - 34.99€ - Accessoires - 0 stock - RUPTURE

FICHIER database.sql :
```sql
CREATE DATABASE IF NOT EXISTS boutique CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE boutique;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    category_id INT,
    discount INT DEFAULT 0,
    is_new BOOLEAN DEFAULT FALSE,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO categories (name, slug) VALUES
('Vêtements', 'vetements'),
('Chaussures', 'chaussures'),
('Accessoires', 'accessoires');

INSERT INTO products (name, description, price, stock, category_id, discount, is_new, image) VALUES
('T-shirt Premium Bio', 'T-shirt en coton bio', 35.99, 45, 1, 0, TRUE, 'tshirt.jpg'),
('Sneakers Urban', 'Baskets urbaines', 99.99, 3, 2, 20, FALSE, 'sneakers.jpg'),
('Casquette Vintage', 'Casquette rétro', 24.99, 28, 3, 0, FALSE, 'casquette.jpg'),
('Jean Slim Stretch', 'Jean coupe slim', 79.99, 20, 1, 30, FALSE, 'jean.jpg'),
('Sac à dos Urbain', 'Sac 20L', 59.99, 12, 3, 0, TRUE, 'sac.jpg'),
('Montre Classic', 'Montre élégante', 89.99, 0, 3, 0, FALSE, 'montre.jpg'),
('Pull Col Roulé', 'Pull en laine', 49.99, 15, 1, 0, FALSE, 'pull.jpg'),
('Ceinture Cuir', 'Ceinture en cuir', 34.99, 0, 3, 0, FALSE, 'ceinture.jpg');
```

FICHIER composer.json :
```json
{
    "name": "formation/php-moderne",
    "description": "Starter pour formation PHP 14 jours",
    "type": "project",
    "require": {
        "php": ">=8.2"
    },
    "require-dev": {
        "phpstan/phpstan": "^1.10",
        "laravel/pint": "^1.13",
        "rector/rector": "^0.18"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        },
        "files": [
            "app/helpers.php"
        ]
    },
    "scripts": {
        "lint": "pint --test",
        "fix": "pint",
        "analyse": "phpstan analyse --level=5",
        "quality": ["@lint", "@analyse"]
    }
}
```

FICHIER .gitignore :
```
/vendor/
.env
.phpunit.result.cache
.DS_Store
Thumbs.db
*.log
```

FICHIER docs/PROGRESSION.md :
Guide résumant ce qui doit être fait jour par jour pour transformer le HTML en PHP.

FICHIER README.md :
- Présentation du projet
- Prérequis (PHP 8.2+, MySQL/MariaDB, Composer)
- Installation (3 étapes)
- Lancement du serveur
- Structure des fichiers
- Lien vers la doc de formation

IMPORTANT :
- Chaque page HTML doit être autonome et fonctionnelle visuellement
- Les commentaires <!-- JOUR X --> sont ESSENTIELS pour guider les apprenants
- Le CSS doit être propre, organisé avec des sections commentées
- Images : utiliser https://via.placeholder.com/300x300/e2e8f0/64748b?text=NomProduit
- Ne PAS créer de fichiers PHP, seulement HTML et CSS
- Le panier affiche 3 articles dans le badge header pour la démo
```

---

## ✅ VÉRIFICATION

Une fois terminé, vérifie que :
- [ ] Chaque page HTML s'affiche correctement dans le navigateur
- [ ] Les liens entre pages fonctionnent
- [ ] Le CSS est responsive (teste sur mobile)
- [ ] Les commentaires <!-- JOUR X --> sont présents
- [ ] Les formulaires ont les bons attributs (name, method, action)
- [ ] Le database.sql est valide
- [ ] Le README est clair
