<?php

    function greet() {
        echo "Bienvenue chez wouam !<br/>";
    };

    function greetNom($name) {
        echo "Bonjour $name !<br/>";
    };

    function calculateVAT($priceExcludingTax, $rate) {
        return $priceExcludingTax*$rate/100;
    }

    function calculateIncludingTax($priceExcludingTax, $rate) {
        return $priceExcludingTax*(1+$rate/100);
    }

    function calculateDiscount($price, $rateDiscount) {
        return $price*(1-$rateDiscount/100);
    }
    
    function formatPrice($amount, $currency, $decimals) {
        return number_format($amount, $decimals, ",", " ") . $currency;
    }
    
    function isInStock($stock){
        if ($stock > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function isOnDiscount($discount){
        if ($discount > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function isNew($dateAdded){
        if (( (time() - strtotime($dateAdded)) / 86400) < 30 ){
            return true;
        }
        else{
            return false;
        }
    }

    function canOrder($stock, $quantity){
        if ($stock >= $quantity){
            return true;
        }
        else{
            return false;
        }
    }    

    function displayBadge($text, $color){
        echo "<span class=\"badge\" style=\"background: $color\">$text</span><br/>";
    }

    function displayPrice($price, $discount){
        if($discount > 0){
            $newPrice = $price*(1-$discount/100);
            echo "<strike>$price</strike> <strong>$newPrice</strong><br/>";
        }
        else{
            echo "<strong>$price</strong><br/>";
        }
    }

    function displayStock($stock){
        $color = match(true){
            $stock === 0 => "red",
            $stock < 5 => "orange",
            $stock < 10 => "yellow",
            default => "green",
        };
        echo "<span class=\"dispo\" style=\"color: $color\">$stock exemplaire(s) restant(s)</span><br/>";
    }


?>