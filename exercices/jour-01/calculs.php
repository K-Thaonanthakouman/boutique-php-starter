<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $prixHT = 654;
        $tva = 20/100;
        $nombre = 7;

    echo 'Le montant de la TVA pour les ' . $nombre . ' articles est de ' . $prixHT*$tva*$nombre . ' cacahuètes.'
    ?>
    <br/>
    <?= 'Le prix TTC unitaire est de ' . $prixHT*$tva+$prixHT . ' cacahuètes.' ?>
    <br/>
    <?= 'Le total TTC pour la quantité commandée est de ' . ($prixHT*$tva+$prixHT)*$nombre . ' cacahuètes.' ?>

    
</body>
</html>