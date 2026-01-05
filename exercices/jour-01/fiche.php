<?php
$name = "Bière";
$price = 5;
$stock;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $name ?></title>
</head>
<body>
    <h1>
        <?= $name . ' à boire !' ?>
    </h1>
    <p>
        Ca coûte <?= $price ?> cacahuètes.
    <?php
        if ($stock == 0) {
            echo 'Mais on n\'en a plus !';
        }
        else if ($stock > 0){
            echo 'Et on en a plein !';
        }
    ?>
    </p>
</body>
</html>