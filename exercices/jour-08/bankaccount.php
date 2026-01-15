<?php

class BankAccount
{
    public function __construct(private float $balance)
    {
        $this->balance = $balance;
    }

    public function deposit(float $amount) : float
    {
        $this->balance = ($this->balance) + $amount; ?>
        <p>Votre versement : <?= $amount ?>€. Vous disposez désormais de <?= $this->balance ?>€ sur votre compte.</p> <?php
        return $this->balance;
    }

    public function withdraw (float $amount) : float
    {
        if ($amount < ($this->balance)){
            $this->balance = $this->balance - $amount; ?>
            <p>Votre retrait : <?= $amount ?>€. Il vous reste <?= $this->balance ?> € sur votre compte.</p><?php
        }
        else{ ?>
            <p>Vous n'avez pas assez d'argent, vous ne pouvez pas retirer la somme demandée.</p><?php
        }
        return $this->balance;
    }

    private function getBalance() : void
    {
        ?><p>Somme actuellement sur votre compte : <?= $this->balance ?>€.</p><?php
    }

    public function getBalance2() : void
    {
        ?><p>Somme actuellement sur votre compte : <?= $this->balance ?>€.</p><?php
    }


}

$moncompte = new BankAccount(150000);
$moncompte->withdraw(149999);
$moncompte->deposit(9999);

$moncompte->getBalance2(); // fonctionne car la méthode est public





var_dump($moncompte);