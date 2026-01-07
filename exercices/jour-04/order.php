<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $status = ["standby", "validated", "shipped", "delivered", "canceled", "on sait pas"];
        $status_paquet = $status[rand(0, count($status)-1)];
        echo $status_paquet . '<br/>';

        switch ($status_paquet) {
            case "standby": ?>
            <span style="color: orange">Commande en attente</span>
            <?php
            break;

            case "validated": ?>
            <span style="color: green">Commande validée, en attente d'envoi</span>
            <?php
            break;

            case "shipped": ?>
            <span style="color: blue">Commande envoyée</span>
            <?php
            break;

            case "delivered": ?>
            <span style="color: brown">Commande livrée</span>
            <?php
            break;

            case "canceled": ?>
            <span style="color: red">Commande annulée</span>
            <?php
            break;

            default: ?>
            <span style="color: black">On a rien pigé à votre commande</span>
            <?php

        }
        echo "<br/>";

        $phrase = match($status_paquet) {
            "standby" => "<span style=\"color: orange\">Commande en attente</span>",
            "validated" => "<span style=\"color: green\">Commande validée, en attente d'envoi</span>",
            "shipped" => "<span style=\"color: blue\">Commande envoyée</span>",
            "delivered" => "<span style=\"color: brown\">Commande livrée</span>",
            "canceled" => "<span style=\"color: red\">Commande annulée</span>",
            default => "<span style=\"color: black\">On a rien pigé à votre commande</span>",
        };
        echo $phrase;
        


    ?>
    
</body>
</html>