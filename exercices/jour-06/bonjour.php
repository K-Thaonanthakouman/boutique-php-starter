<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    if ($_GET["name"] !== NULL){
        $name = $_GET["name"];
    }
    else{
        $name = "Patate";
    }
    echo "Wesh $name, bien ou bien ?<br/>";

    if ($_GET["age"] !== NULL){
        $age = $_GET["age"];
        echo "T'as $age ans. C'est bien, même si bon, on s'en fout.<br/>";
    }
    else{
        echo "On ne connaît pas ton âge, mais ça va, on s'en fout.<br/>";
    }


?>
    
</body>
</html>