<?php

session_start();

if (($_POST["username"] == "admin") && ($_POST["password"] == "1234")){
    $_SESSION["user"] = $_POST["username"];
    header("Location: dashboard.php");
    exit;
}
else if((empty($_POST["username"]) == true) && (empty($_POST["password"]) == true)){
    echo "";
}
else if(($_POST["username"] != "admin") && ($_POST["password"] != "1234")){
    echo "Identifiants incorrects";
}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="login.php">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Submit !</button>
</form>

<?php

    var_dump($_POST["username"]);
    var_dump($_POST["password"]);
    var_dump($_SESSION["user"]);


?>




</body>
</html>