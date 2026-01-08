<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $stock = rand(0,100);
        $active = true;
        $promoEndDate = "2026-02-28";

        if ($stock > 0 && $active == true) {
            echo "Le produit est disponible.";
        }
        else {
            echo "Le produit n'est pas disponible.";
        }

        echo "<br/>";
        
        $date = date("Y-m-d");
        echo "$date et $promoEndDate<br/>";
        if(strtotime($date) <= strtotime($promoEndDate)) {
            echo "Le produit est en promo.";
        }
        else {
            echo "Le produit n'est pas en promo.";
        }

        echo "<br/>";
        var_dump(strtotime($date));
        echo "<br/>";
        var_dump(strtotime($promoEndDate));
        echo "<br/>";

        $dispo = match($stock) {
            0 => "Le produit n'est pas disponible.",
            1, 2, 3, 4, 5 => "Attention, il n'en reste plus que $stock disponible !",
            default => "Le produit est disponible."
        };
        echo $stock . ' unité(s) : ' . $dispo;

    ?>
    
</body>
</html>