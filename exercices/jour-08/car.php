<?php
class Car
{
    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getAge(): int
    {
        $today = getdate();
        $age = $today["year"] - ($this->year);
        return $age;
    }

    public function display() : void
    {
        echo $this->brand . ' ' . $this-> model . ', date d\'il y a ' . $this->getAge() . ' ans.';
    }

}

$car1 = new Car("Ferrari", "458 Italia", 2009);
$car2 = new Car("Dodge", "Viper VX I", 2013);
$car3 = new Car("Citroën", "2 CV", 1949);

$car1 -> display();?><br/><?php
$car2 -> display();?><br/><?php
$car3 -> display();?><br/><?php

?>