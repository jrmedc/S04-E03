<?php

/**
 * Class BankAccount
 * La classe est notre plan de fabrication pour créer des objets, ici,
 * les objets qu'on veut créer à partir du plan, ce sont des comptes bancaires
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */
class BankAccount
{
    // Les propriétés sont des attributs qui caractérisent les objets
    // Tous les objets issus d'une même classe possèdent les mêmes propriétés
    // mais chaque objet aura ses propres valeurs pour chacune de ses propriétés :
    // => par exemple, on a tous un numéro de compte différent

    // Pour définir nos propriétés, on utilise le mot clé 'public',
    // on verra la prochaine journée à quoi il correspond et on verra
    // également qu'on peut mettre d'autres termes que 'public'
    public $balance; // solde disponible
    public $iban; // numéro de compte : International Bank Account Number
    public $owner; // titulaire du compte
    public $type; // type de compte : courant, livret A, etc...
    public $bankName; // nom de la banque

    // On peut directement donner une valeur à une propriété
    // lors de sa déclaration
    public $currency = '€'; // devise du compte (€, $...)
    public $country = 'FR'; // pays de domiciliatation

    // > La méthode __construct est une méthode particulière qui est appelée
    // automatiquement lors de l'instanciantion de la classe (lors du new BankAccount())
    // > Cette méthode doit forcément s'appeler __construct
    // > Cette méthode est unique, il ne peut pas avoir plusieurs méthodes __construct
    // > Cette méthode est faculative, au moment du new BankAccount() PHP regarde
    // si la méthode __construct existe dans la class BankAccount :
    // - si la méthode existe, alors il l'exécute en lui transmettant les arguments éventuels
    // - sinon, il crée l'objet mais sans faire appel au constructeur
    // Comme dans toute fonction, on peut rendre un paramètre optionnel
    // en lui donnant une valeur par défaut
    public function __construct($paramOwner, $paramBalance = 0)
    {
        echo 'On crée le compte de ' . $paramOwner . ' avec un solde initial de ' . $paramBalance . $this->currency . '<br>';

        // A la création d'un objet, si on reçoit des informations en paramètre
        // du constructeur, cela peut nous permettre d'initialiser les valeurs
        // des propriétés de l'objet en cours de création

        // Pour accéder aux propriétés de l'objet qu'on est en train de manipuler,
        // on ne peut pas utiliser $johnAccount ou $lisaAccount, car le code
        // de la classe ne peut pas connaître à l'avance tous noms de variables qui
        // correspondront à des objets BankAccount. A la place, on utilise le mot clé
        // générique $this qui fait référence à l'objet en cours d'utilisation :
        // - quand je suis en train de créer le compte de John
        // => c'est comme si $this correspondait à $johnAccount
        // - quand je suis en train de créer le compte de Lisa
        // => c'est comme si $this correspondait à $lisaAccount
        $this->owner = $paramOwner;
        $this->balance = $paramBalance;
        // On peut vérifier que $this correspond bien à l'objet en train d'être manipulé
        // var_dump($this);
    }

    public function credit($paramAmount)
    {
        echo 'On crédite le compte de ' . $this->owner . ' de ' . $paramAmount . $this->currency . '<br>';

        // $this fait référence à l'objet qui appelle la méthode credit()
        // - si c'est $johnAccount qui appelle credit(), alors $this correspond
        // à $johnAccount
        // - si c'est $lisaAccount qui appelle credit(), alors $this correspond
        // à $lisaAccount
        $this->balance += $paramAmount; //équivalent de $this->balance = $this->balance + $paramAmount;
    }
}
