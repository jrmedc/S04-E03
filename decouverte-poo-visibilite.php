<?php

require 'inc/BankAccountSecured.php';

$lisaAccountSecured = new BankAccountSecured('Lisa');
var_dump($lisaAccountSecured);

// Si on accède à une propriété 'balance' déclarée en visibilité 'private'
// dans du code externe à la classe BankAccountSecured, l'accès à cette propriété
// est interdit en lecture et en écriture
// => Fatal error: Uncaught Error: Cannot access private property
// var_dump($lisaAccountSecured->balance); // accès en lecture interdit
// $lisaAccountSecured->balance = 1000000; // accès en écriture interdit également

// Pour accéder aux valeurs en lecture, on passe alors par les méthodes Getters
var_dump($lisaAccountSecured->getBalance());
$lisaAccountSecured->credit(2000);
var_dump($lisaAccountSecured->getBalance());

// Et si on souhaite modifier l'IBAN, on peut le faire avec la méthode Setter setIban()
var_dump($lisaAccountSecured->getIban());
$lisaAccountSecured->setIban('FR7630001007941234567890185');
var_dump($lisaAccountSecured->getIban());

// Si jamais on a plein de modifs d'IBAN à faire et qu'on veut vérifier
// la validité de chaque nouvel IBAN avant de le modifier,
// il faudrait faire la vérif à chaque fois :
// $newIban = 'FR7630001007941234567811111';
// Si (l'iban est valide) {
//     modifier l'iban de lisa
// }
// $newIban = 'FR7630001007941234567822222';
// Si (l'iban est valide) {
//     modifier l'iban de lisa
// }
// $newIban = 'FR7630001007941234567833333';
// Si (l'iban est valide) {
//     modifier l'iban de lisa
// }
// Au lieu de cela, on peut intégrer la vérification directement dans notre Setter setIban()
// comme ça la vérification sera faite automatiquement à chaque modification de l'IBAN

if ($lisaAccountSecured->setIban('FR7630001007941234567890185')) {
    echo "L'IBAN a bien été mis à jour.";
}
var_dump($lisaAccountSecured->getIban());

if (!$lisaAccountSecured->setIban('FR7630001007941234567897777')) {
    echo "L'IBAN n'a pas été mis à jour car le format est invalide.";
}
var_dump($lisaAccountSecured->getIban());
