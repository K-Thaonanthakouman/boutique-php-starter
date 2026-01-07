<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $a = 0;
        $b = "";
        $c = null;
        $d = false;
        $e = "0";

        echo "\$a = 0<br/>";
        echo "\$b = \"\"<br/>";
        echo "\$c = null<br/>";
        echo "\$d = false<br/>";
        echo "\$e = \"0\"<br/>";
        echo "<br/>";

        echo "\$a == \$b :";
            if ($a == $b){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$a === \$b :";
            if ($a === $b){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$a == \$c :";
            if ($a == $c){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$a === \$c :";
            if ($a === $c){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$a == \$d :";
            if ($a == $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$a === \$d :";
            if ($a === $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$a == \$e :";
            if ($a == $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$a === \$e :";
            if ($a === $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$b == \$c :";
            if ($b == $c){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$b === \$c :";
            if ($b === $c){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$b == \$d :";
            if ($b == $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$b === \$d :";
            if ($b === $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$b == \$e :";
            if ($b == $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$b === \$e :";
            if ($b === $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$c == \$d :";
            if ($c == $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$c === \$d :";
            if ($c === $d){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$c == \$e :";
            if ($c == $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$c === \$e :";
            if ($c === $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "<br/>";

        echo "\$d == \$e :";
            if ($d == $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }

        echo "\$d === \$e :";
            if ($d === $e){
                echo "affiche true<br/>";
            }
            else {
                echo "affiche false<br/>";
            }


    ?>
    <p>
        $a == $c : null est interprété comme int 0.<br/>
        $a == $d : false est interprété comme int 0.<br/>
        $a == $e : "0" est interprété comme int 0.<br/>
        $e n'est pas un ensemble vide, donc $c == $e retourne false.
    </p>

</body>
</html>