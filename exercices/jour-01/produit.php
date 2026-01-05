<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $name = "Oreiller";
        $price = 19.99;
        $stock = 418;
        $onSale = true;
    ?>
    <br/>
    <?= var_dump($name); ?>
    <br/>
    <?= var_dump($price); ?>
    <br/>
    <?= var_dump($stock); ?>
    <br/>
    <?= var_dump($onSale); ?>
    <br/>
    <?= 'Le produit ' . $name . ' coûte ' . $price . ' cacahuètes.' ?>
    <br/>
    <?= 'Il reste encore ' . $stock . ' articles en stock.' ?>


</body>
</html>