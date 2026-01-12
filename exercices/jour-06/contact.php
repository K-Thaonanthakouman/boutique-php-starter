<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="contact.php">
    <input type="text" name="name">
    <input type="text" name="email">
    <textarea name="message"></textarea>
    <button type="submit">Submit !</button>
</form>



<?php

    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    if(substr_count($name, " ") == strlen($name)){
        $name = NULL; // donner NULL à la variable si la chaîne de caractères ne contient que des espaces
    }
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");
    if(substr_count($message, " ") == strlen($message)){
        $message = NULL; // donner NULL à la variable si la chaîne de caractères ne contient que des espaces
    }

    if ((($name != NULL) && ($email != NULL) && ($message != NULL)) && (filter_var($email, FILTER_VALIDATE_EMAIL) == true) && (strlen($message) >= 10)){
        echo "Bonjour $name !<br/>";
        echo "Votre adresse mail est $email.<br/>";
        echo "Votre message : $message.<br/>";
    }
    else{
        echo "Formulaire incomplet :<br/>";
    }
    
    if($name == NULL){
        echo "Nom non valide.<br/>";
    }
    if(($email == NULL) || (filter_var($email, FILTER_VALIDATE_EMAIL) === false)){
        echo "E-mail non valide.<br/>";
    }
    if(strlen($message) < 10){
        echo "Message non valide.<br/>";
    }

    var_dump($name);
    var_dump($email);
    var_dump($message);


?>
    
</body>
</html>