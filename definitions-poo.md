# Définitions autour de la POO

## POO

- POO = Programmation Orientée Objet

## Objet

- Un objet est une représentation d'une entité **matérielle** ou **immatériel** :
  - matérielle : animal, personne, voiture, stylo, livre...
  - immatérielle : compte bancaire, pensée, logiciel, chanson...

- Un objet possède des **propriétés** (celles définies dans la classe à partir de laquelle il a été créé) et avec des valeurs propres à l'objet.

- Un objet a un **type de donnée spécifique** : `object`

- Un objet est **créé à partir d'un modèle** qu'on appelle une **classe**.

## Classe

- **Plan de fabrication**/modèle/moule qui définit les caractéristiques communes d'un type d'objet (une voiture par exemple) et ses actions possibles (exemple pour une voiture : démarrer).

- Les objets sont **instanciés** (= créés) à partir de ce plan de fabrication (c'est à dire à partir de la classe). C'est pourquoi on appelle aussi les objets des **instances de classe**.

## Propriétés

- **Caractéristiques d'un objet** : tout ce qui définit notre objet.

- Exemples :
  - pour une personne : taille, genre, nom, prénom, métier, couleurs des yeux...
  - pour une voiture : marque, nombre de roues, prix, couleur, nombre de portes, carburant, puissance du moteur, numéro d'immatriculation, consommation, kilométrage...

- Une propriété peut contenir n'importe quel type de données : `int`, `float`, `bool`, `string`, `array`, et même `object`...

## Méthodes (actions possibles pour les objets)

- Une méthode est une **action possible** mise à disposition de tous les objets issus de cette classe.

- On appelle cela une **méthode** mais ce n'est rien d'autre qu'une **fonction à l'intérieur d'une classe**.

- Exemples :
  - pour une personne : bouger, dormir, boire, manger, coder, donner un cours, suivre un cours....
  - pour une voiture : polluer, accélérer, démarrer, freiner, klaxonner, caler...

## Constructeur

- C'est une méthode que l'on peut ajouter dans la classe et qui est exécutée lors de la **création de l'objet**.

- Si elle est présente dans la classe, elle sera **exécutée automatiquement** par PHP lors de l'**instanciation de la classe** (c'est à dire lors de la création de l'objet avec `new MaClasse()`).

- Pour que PHP puisse identifier cette méthode constructeur, elle doit **forcément s'appeler** `__construct`.

- Cette méthode sert généralement à initialiser les propriétés de l'objet.
