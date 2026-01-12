<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$errors = [];

$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
if ((ctype_alnum($username) == false) || ((strlen($username) < 3) || (strlen($username) > 20))){
    $errors["username"] = "Le nom n'est pas valide";
}

$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
if (strlen($password) < 8){
    $errors["password"] = "Le mot de passe n'est pas valide";
}

$confirmation = htmlspecialchars($_POST["confirmation"], ENT_QUOTES, "UTF-8");
if ($confirmation !== $password){
    $errors["confirmation"] = "Le mot de passe est mal confirmé";
}

$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $errors["email"] = "L'adresse mail n'est pas valide";
}

?>

<form method="POST" action="inscription.php">
    <input type="text" name="username"
    <?php
    if (isset($errors["username"]) == false){ ?>
    value=<?=$username?>
    <?php
    }
    ?>>
    <?php
    if ((isset($errors["username"]) == true) && (empty($username) != true)){
        echo $errors["username"];
    }
    ?>
    <br/>

    <input type="password" name="password"
    <?php
    if (isset($errors["password"]) == false){ ?>
    value=<?=$password?>
    <?php
    }
    ?>>
    <?php
    if ((isset($errors["password"]) == true) && (empty($password) != true)){
        echo $errors["password"];
    }
    ?>
    <br/>

    <input type="password" name="confirmation"
    <?php
    if (isset($errors["confirmation"]) == false){ ?>
    value=<?=$confirmation?>
    <?php
    }
    ?>>
    <?php
    if ((isset($errors["confirmation"]) == true) && (empty($confirmation) != true)){
        echo $errors["confirmation"];
    }
    ?>
    <br/>

    <input type="text" name="email"
    <?php
    if (isset($errors["email"]) == false){ ?>
    value=<?=$email?>
    <?php
    }
    ?>>
    <?php
    if ((isset($errors["email"]) == true) && (empty($email) != true)){
        echo $errors["email"];
    }
    ?>
    <br/>
    <button type="submit">Submit !</button>
</form>


<?php

    var_dump($username);
    var_dump($password);
    var_dump($confirmation);
    var_dump($email);
    var_dump($errors);

?>
    
</body>
</html>