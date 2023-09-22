<?php

/**
 * Class Person
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// Définition/déclaration de la classe Person

// Je déclare la classe Person
class Person
{
    // Je déclare les propriétés de la classe
    public $name;
    public $age;
    public $gender;
    public $size;

    public function __construct($name, $age, $gender, $size = 0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->size = $size;
    }

    public function present()
    {
        echo "Salut, je m'appelle " . $this->name . "<br>";
        echo "J'ai " . $this->age . "ans et je mesure " . $this->size . "cm.<br>";
    }
}
