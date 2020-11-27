# La loire à velo

## Presentation du projet

_C'est un projet de cours réaliser durant mon premier trimestre de premiere spécialité NSI_

Ce projet de cours est réalisé entre le 3 Novembre 2020 et 1er Decembre 2020. Le but est, comme indiquer dans le PDF de `tools/support-de-cours` est de réaliser un petit site web pour un site d'hebergement de gites autour de la Loire. L'objectif est de concevoir un formulaire de réservation et sauvegarder les données dans un fichier texte sur le serveur. Il faudra aussi rendre 3 documents, un sur les base de l'HTML, un autre sur les bases du JS et un dernier sur une introduction à PHP.

## Lancer le projet

Pour lancer le projet vous aurez besoin de PHP >= 7.4 uniquement ! C'est le seul prérequis. Il suffira alors de lancer `php -S 127.0.0.1:8000 -t public/` puis vous rendre sur `127.0.0.1:8000` dans le navigateur pour voir le projet ! Pour le deployer une configuration ansible est fournis.

## Organisation du projet

Le projet est diviser en divers dossier assez explicite. `app` contient les sources du projets, `docs` la documentation, `public` les ressources publiques, `src` la couche d'abstraction du projet, `templates` les templates, `tools` contient divers fichier tel que la maquette, les exercices, la configuration pour déployer etc.... Le dossier `var` contient toute les données écrivable par le site tel que des logs ou juste des données. Il doit pouvoir être écrivable par l'application.

```
├───app
│   └───Controller
├───docs
│   ├───HTTPComponant
│   └───Validation
├───public
│   └───assets
├───src
│   ├───Autoload
│   ├───FileSystem
│   ├───Http
│   ├───Routing
│   ├───Template
│   ├───Utils
│   └───Validator
│       └───Constraint
├───templates
├───tools
│   ├───ansible
│   ├───figma
│   └───support-de-cours
└───var
    └───data
```

## Outils

La maquette est disponnible sur [Figma](https://www.figma.com/file/UqCC0zP1vEjY7tTGodFdLQ/la-loire-a-velo?node-id=0%3A1)

## TO DO

Base minimal pour par rapport au cahier des charges :

- Utilisation du JavaScript pour gérer les évènements du formulaire
- Récuperation des données dans un fichier texte au niveau du serveur
- ~~Redirection sur une page avec le récapitulatif des données envoyer~~

Pour aller plus loin :

- ~~Gestion du responsive~~
- ~~Utilisation d'un TailwindLike (maison)~~
- ~~Creation d'un micro-framework MVC maison (oui j'abuse)~~
- Dockerisation du projet
- Deployement du projet
- Utilisation d'ansible pour deploy

## Note au professeur

> Ce qu'il y a à rendre pour chaque semaine sera sur une branche séparer (quand je le rendrai le projet sera correctement checkout). En plus de l'envoyer par Teams, le projet est disponnible sur [Github](https://github.com/Superkooka/loire-a-velo) en priver. Envoyez-moi votre username que je puisse vous y inviter si vous le voulez. La branch principal est ma branch perso, elle possde quelques features ainsi qu'outils en plus.

J'ai volontairement (au risque de perdre des points) pas ajouter un dropdown pour le genre car je trouver cela trop restrictif pour l'utilisateur de choisir entre Homme et Femme et que ça n'a place ici. Pour vous montrer que je sais quand même le faire voici un exemple:

```html
<select id="gender" name="gender">
  <option value="male">Homme</option>
  <option value="female">Femme</option>
</select>
```

Au niveau du CSS j'ai opté pour une approche de CSS avec des class utilitaire plutôt que sémantique afin de facilité la maintenabilité du code, ainsi que simplifier la gestion du responsive. Pour les breakpoints CSS j'ai utiliser les mêmes que ce de TailwindCSS et Bootstrap.

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
