<?php

class User
{
    public function __construct(string $name, string $email, string $registrationDate = "0")
    {
        
        $this->name = $name;
        $this->email = $email;
        if ($registrationDate == 0 || strtotime($registrationDate) == false){
            $this->registrationDate = date("d.m.Y");
        }
        else{
            $this->registrationDate = $registrationDate;
        }
    }

    public function isNewMember() : bool
    {
        if (((time() - strtotime($this->registrationDate)) / 86400) <= 30){
            $new = true;
        }
        else{
            $new = false;
        }
        return $new;
    }
}

$user1 = new User("Patate", "patate@connerie.com", "02/08/2015");
$user1 -> isNewMember();
?>
<p>L'utilisateur <?= $user1->name ?>, dont son adresse mail est <?= $user1->email ?>, s'est enregistré le <?= $user1->registrationDate ?>.<br/>
<?php
if ($user1->isNewMember() == true){ ?>
    C'est donc un nouveau membre. <?php
}
else{ ?>
    Ce n'est donc pas un nouveau membre. <?php
}
?>
</p>

<?php



var_dump($user1);
var_dump($user1->isNewMember());
var_dump(time());
var_dump(strtotime(date("d.m.Y")));
var_dump(((time() - strtotime(date("d.m.Y"))) / 86400));

?>