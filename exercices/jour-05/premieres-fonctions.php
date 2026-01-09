<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function greet() {
        echo "Bienvenue chez wouam !<br/>";
    };

    function greetNom($name) {
        echo "Bonjour $name !<br/>";
    };

    greet();

    $names = ["Patate", "Calamar", "Nounouille", "Grande Saucisse", "Pingouin", "Pelleteuse"];
    
    foreach ($names as $name) {
        greetNom($name);
    };

?>

    
</body>
</html>