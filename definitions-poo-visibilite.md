# Définitions autour de la POO (suite)

## Visibilité

La *visibilité* d'une propriété permet de définir si on peut *lire* et *écrire* dans cette propriété depuis un code externe à la classe.

- **public** = *open bar* => tout le monde peut faire ce qu'il veut des propriétés (lire et écrire) depuis n'importe où
- **private** = *sécurisé* => seul le code à l'intérieur de la classe peut lire et écrire dans la propriété

Utilité :

- **Verrouiller l'accès à une propriété** pour empêcher qu'un code externe à la classe accède à la valeur de la propriété ou la modifie, cela **facilite la maintenance du code** et peut **éviter des bugs** dans notre code.

On a le **même principe** de visibilité **sur les méthodes** définies dans la classe :

- une méthode `public` peut être appelée depuis l'intérieur de la classe et depuis un code externe à la classe
- une méthode `private` peut être appelée uniquement depuis l'intérieur de la classe (mais PAS depuis un code externe à la classe sinon FATAL ERROR)

## Getter (ouvre l'accès en lecture)

Méthode (généralement) `public` d'une classe retournant la valeur d'une propriété déclarée en visibilité `private`.

## Setter (ouvre l'accès en écriture)

Méthode (généralement) `public` d'une classe modifiant la valeur d'une propriété déclarée en visibilité `private`.
