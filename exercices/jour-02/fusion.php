<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $clothes = ["T-shirt", "Jean", "Pull"];
        $accessories = ["Ceinture", "Montre", "Lunettes"];
        $catalog = array_merge($clothes, $accessories);
        var_dump($catalog);

    ?>
    <br/>
    Il y a <?= count($catalog) ?> dans le tableau $catalog.
    <br/>

    <?php

        array_unshift($catalog, "Chemise", "Short");
        var_dump($catalog);

    ?>


    
</body>
</html>