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
    <p>
        <?= var_dump($name); ?>
        <br/>
        <?= var_dump($price); ?>
        <br/>
        <?= var_dump($stock); ?>
        <br/>
        <?= var_dump($onSale); ?>
    </p>

    <?= 'Le produit ' . $name . ' coûte ' . $price . ' cacahuètes.' ?>
    <br/>
    <?= 'Il reste encore ' . $stock . ' articles en stock.' ?>

    <p>
        Quelle différence vois-tu entre var_dump($price) quand $price = "29.99" vs $price = 29.99 ?<br/>
        - L'un est string, l'autre est float.
    </p>

</body>
</html>