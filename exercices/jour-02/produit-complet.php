<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $product = [
            "name" => "bungalow",
            "images" => ["https://www.journeyera.com/wp-content/uploads/2024/02/Seychelles-Over_water_Bungalows-3-735x490.jpg", "https://www.journeyera.com/wp-content/uploads/2024/02/Seychelles-Over_water_Bungalows-11-735x490.jpg", "https://www.journeyera.com/wp-content/uploads/2024/02/Seychelles-Over_water_Bungalows-13-735x490.jpg"],
            "sizes" => ["S", "M", "L", "XL"],
            "reviews" => [
                ["author" => "Jean-Michel Jaimepa", "rating" => 0, "comment" => "Non mais arrêtez avec vos logements hors de prix dans des lieux paumés tout moche ! Venez plutôt en banlieue parisienne, là vous verrez la vraie vie, là vous verrez les vrais gens !"],
                ["author" => "Feignassedu38", "rating" => 5, "comment" => "Ah oui, ça c'est chez moi, je reconnais !... On signe où pour y aller svp ?"],
            ],
        ];
    ?>

    <img src=<?= $product["images"][1] ?>>
    <br/>
    Le nombre de tailles : <?= count($product["sizes"]) ?>
    <br/>
    La note du 1er avis : <?= $product["reviews"][0]["rating"] ?>

    
</body>
</html>