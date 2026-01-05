<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $a = "6";
        $b = 3;
        $c = $a + $b;

        var_dump($a);
    ?>
    <br/>
    <?= var_dump($b); ?>
    <br/>
    <?= var_dump($c); ?>
    <br/>
    <?php

        $price = "29.99€";
        $result = $price + 10;
        var_dump($result);

    ?>
    <br/>
    <?= var_dump($price) ?>

    <p>
        Que se passe-t-il quand PHP additionne un string et un int ?<br/>
        - Si le string est convertissable en int, on peut retrouver un int. Sinon on a un message d'erreur.
    </p>
    <p>
        Pourquoi le deuxième exemple pose problème ?<br/>
        - $price est composé d'un nombre décimal et d'un caractère. L'addition d'un float avec un autre type rend l'opération approximative.
    </p>



    
</body>
</html>