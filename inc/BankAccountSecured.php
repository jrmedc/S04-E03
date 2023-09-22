<?php

/**
 * Class BankAccountSecured
 * On définit une classe Secured au sens cloisonnement du code,
 * mais pas au sens sécurité bancaire
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */
class BankAccountSecured
{
    private $balance; // solde disponible
    private $iban; // numéro de compte : International Bank Account Number
    private $owner; // titulaire du compte
    private $type; // type de compte : courant, livret A, etc...
    private $bankName; // nom de la banque
    private $currency = '€'; // devise du compte (€, $...)
    private $country = 'FR'; // pays de domiciliation

    public function __construct($paramOwner, $paramBalance = 0)
    {
        echo 'On crée le compte de ' . $paramOwner . ' avec un solde initial de ' . $paramBalance . $this->currency . '<br>';

        $this->owner = $paramOwner;
        $this->balance = $paramBalance;
    }

    public function credit($paramAmount)
    {
        echo 'On crédite le compte de ' . $this->owner . ' de ' . $paramAmount . $this->currency . '<br>';

        $this->balance += $paramAmount;
    }

    /**
     * Cette méthode s'appelle un Getter : elle permet de donner accès en lecture
     * (depuis un code externe à la classe) à la valeur de la propriété 'balance'
     * qui est pourtant déclarée private
     */
    public function getBalance()
    {
        // Ici, avant de retourner la valeur, il est parfois utile
        // de faire des vérifications/traitements supplémentaires
        return $this->balance;
    }

    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Cette méthode s'appelle un Setter : elle permet de donner accès en écriture
     * (depuis un code externe à la classe) pour modifier la valeur de la propriété
     * 'iban' qui est pourtant déclarée private
     */
    public function setIban($newIban)
    {
        // Avant de modifier l'iban, on s'assure de sa validité
        // if ($this->checkIbanIsValid($newIban) === true)  {
        if ($this->checkIbanIsValid($newIban)) {
            $this->iban = $newIban;
            // l'iban est valide, il a été modifié, on retourne vrai
            return true;
        } else {
            // l'iban n'est pas valide, on ne le modifie pas et on retourne faux
            return false;
        }
    }

    /**
     * Méthode permettant de vérifier qu'un IBAN est bien au bon format
     * => elle retourne true ou false suivant la vérification
     * ? Oui, ok, le code de cette méthode est bien compliqué mais c'est pas ce qui nous
     * ? intéresse aujourd'hui, pas besoin de le comprendre dans les détails ;-)
     * ? Tout ce qu'on sait, c'est qu'il retourne :
     * ?   - true si l'IBAN est valide
     * ?   - false si l'IBAN n'est pas valide
     */
    // Si on se sert uniquement de checkIbanIsValid() à l'intérieur de la classe
    // on peut la déclarée en visibilité private
    private function checkIbanIsValid($iban)
    {
        if (
            !is_string($iban) ||
            !preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)
        ) {
            return false;
        }

        $country = substr($iban, 0, 2);
        $checkInt = intval(substr($iban, 2, 2));
        $account = substr($iban, 4);
        $search = range('A', 'Z');
        $replace = [];
        foreach (range(10, 35) as $tmp) {
            $replace[] = strval($tmp);
        }
        $numStr = str_replace($search, $replace, $account . $country . '00');
        $checksum = intval(substr($numStr, 0, 1));
        $numStrLength = strlen($numStr);
        for ($pos = 1; $pos < $numStrLength; $pos++) {
            $checksum *= 10;
            $checksum += intval(substr($numStr, $pos, 1));
            $checksum %= 97;
        }

        return $checkInt === 98 - $checksum;
    }
}
