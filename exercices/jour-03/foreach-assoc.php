<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $machin = [
            "name" => "Machin",
            "age" => "56",
            "city" => "Montcuq",
            "job" => "Chômeur professionnel",
        ];

    foreach ($machin as $key => $value) {
        echo "<strong>$key</strong> : $value <br/>";
    }

    ?>
    
</body>
</html>