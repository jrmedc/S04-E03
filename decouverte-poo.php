<?php

// ----------------------------------------------------------
//                       Sans POO
// ----------------------------------------------------------

echo '<h3>Sans POO</h3>';

// Jusqu'à présent pour réprésenter des données complexes,
// on utilisait des tableaux
$personJohn = [
    'name' => 'John',
    'age' => 35,
    'gender' => 'man',
    'size' => 182
];

$personLisa = [
    'name' => 'Lisa',
    'age' => 30,
    'gender' => 'woman',
    'seize' => 170
];

function presentPerson($personData)
{
    var_dump($personData);
    echo "Salut, je m'appelle " . $personData['name'] . "<br>";
    echo "J'ai " . $personData['age'] . "ans et je mesure " . $personData['size'] . "cm.<br>";
}

presentPerson($personJohn);
// Si notre tableau réprésentant Lisa a été mal défini (clé seize au lieu de size)
// => la fonction presentPerson qui s'attend à un certain format de donnée
// ne fonctionnera pas comme attendu
// presentPerson($personLisa); // Notice : Undefined index: size)

// ----------------------------------------------------------
//             Utilisation d'objets BankAccount
// ----------------------------------------------------------

echo '<h3>Class BankAccount</h3>';

// Avant de pouvoir instancier la classe, on a besoin de fournir
// sa définition à PHP et donc d'inclure le fichier contenant
// la classe
require 'inc/BankAccount.php';

// Pour créer un objet (instance de classe), on utilise le mot clé 'new'
// suivi du nom de la classe
// $johnAccount = new BankAccount();
// var_dump($johnAccount);

// Pour pouvoir créer un objet en lui fournissant directement
// les valeurs de certaines de ses propriétés, on lui fournit
// les valeurs entre parenthèses lors de l'instanciation
$johnAccount = new BankAccount('John', 2000);
$lisaAccount = new BankAccount('Lisa', 5000);
$lucasAccount = new BankAccount('Lucas');
// var_dump($johnAccount);
// var_dump($lisaAccount);
// var_dump($lucasAccount);

$johnAccount->credit(4000);
// var_dump($johnAccount);

$lisaAccount->credit(10000);
// var_dump($lisaAccount);


// Pour accéder aux propriétés d'un objet, on utilise '->' suivi
// du nom de la propriété
// ! ATTENTION sans le '$' avant le nom de la propriété
// var_dump($johnAccount->country);

// On peut aussi accéder en écriture, c'est à dire modifier la valeur
// d'une propriété
// $johnAccount->owner = 'John';
// $johnAccount->balance = 500;

// var_dump($johnAccount);

// Si on modifie une propriété non définie dans la classe,
// PHP la rajoute automatiquement dans l'objet concerné
// ! ATTENTION : cela pose un problème d'incohérence entre les
// objets BankAccount car certains auraient cette propriété en plus
// et d'autres non
// => on doit donc absolument éviter de rajouter des propriétés à la volée
// (au cours de l'exécution du code)
// $johnAccount->catName = 'Mioumiou';
// var_dump($johnAccount); // $johnAccount devient incohérent avec la class BankAccount dont il est issu


// ----------------------------------------------------------
//                Utilisation d'objets Person
// ----------------------------------------------------------

echo '<h3>Class Person</h3>';

require 'inc/Person.php';

$johnPerson = new Person('John', 35, 'man', 182);
var_dump($johnPerson);
$johnPerson->present();

$lisaPerson = new Person('Lisa', 32, 'woman', 170);
var_dump($lisaPerson);
$lisaPerson->present();
