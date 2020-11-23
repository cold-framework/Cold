# La loire à velo

## Note au professeur

> Ce qu'il y a à rendre pour chaque semaine sera sur une branche séparer (quand je le rendrai le projet sera correctement checkout). En plus de l'envoyer par Teams, le projet est disponnible sur [Github](https://github.com/Superkooka/loire-a-velo) en priver. Envoyez-moi votre username que je puisse vous y inviter si vous le voulez. La branch principal est ma branch perso, elle possde quelques features ainsi qu'outils en plus.

J'ai volontairement (au risque de perdre des points) pas ajouter un dropdown pour le genre car je trouver cela trop restrictif pour l'utilisateur de choisir entre Homme et Femme et que ça n'a place ici. Pour vous montrer que je sais quand même le faire voici un exemple:

```html
<select id="gender">
  <option value="male">Homme</option>
  <option value="female">Femme</option>
</select>
```

Le nommage des classes en css est pas tiptop comme la gestion du responsive mais je vais modifier ça dans les prochains jours. Les classes seront nommer de la sorte `media:class` par exemple `lg:row` pour afficher en ligne sur les écrans de moyene taille (les tablets).
Pour les breakpoints CSS j'ai utiliser les mêmes que ce de TailwindCSS et Bootstrap.

```css
/* xs --- Extra small devices (portrait phones, less than 576px) */
/* No media query, mobil first approach */

/* sm --- Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) {
  ...;
}

/* md --- Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
  ...;
}

/* lg --- Large devices (desktops, 992px and up) */
@media (min-width: 992px) {
  ...;
}

/* xl --- Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
  ...;
}
```

## Presentation du projet

_C'est un projet de cours réaliser durant mon premier trimestre de premiere spécialité NSI_

Ce projet de cours est réalisé entre le 3 Novembre 2020 et 1er Decembre 2020. Le but est, comme indiquer dans le PDF de `tools/support-de-cours` est de réaliser un petit site web pour un site d'hebergement de gites autour de la Loire. L'objectif est de concevoir un formulaire de réservation et sauvegarder les données dans un fichier texte sur le serveur. Il faudra aussi rendre 3 documents, un sur les base de l'HTML, un autre sur les bases du JS et un dernier sur une introduction à PHP.

## Organisation du projet

Le suit pour le moment une architecture assez simple. La racine étant le dossier public, le seul fichier de style et le seul fichier de javascript sont dans `assets`. Dans `tools` il y a les supports de cours + la maquette figma. Les fichiers html dans à la racine.

```
├───assets
└───tools
    ├───figma
    └───support-de-cours
```

## Outils

La maquette est disponnible sur [Figma](https://www.figma.com/file/UqCC0zP1vEjY7tTGodFdLQ/la-loire-a-velo?node-id=0%3A1)

## TO DO

Base minimal pour par rapport au cahier des charges :

- Utilisation du JavaScript pour gérer les évènements du formulaire
- Récuperation des données dans un fichier texte au niveau du serveur
- Redirection sur une page avec le récapitulatif des données envoyer

Pour aller plus loin :

- ~~Gestion du responsive~~
- ~~Utilisation d'un TailwindLike (maison)~~

- Utilisation de Vite.JS pour les assets dans l'env de dev
- Utilisation de Rollup pour les assets dans l'env de prod
- Gestion des éléments du formulaire avec Preact
- Utilisation de Turbolink
- Utilisaiton d'un makefile pour simplifier toutes les commandes
- Backend avec Symfony
- Mise en place d'un petit backoffice avec un systeme de notification (ws sur le site + mail) pour l'admin
- Mise en place de GitHub Action pour le CI
- Utilisation de linter twig/php/css/js
- Ecriture de deux trois tests unitaire
- Dockerisation du projet

- Deployement du projet (si j'ai le temps + l'envie : ansible)
