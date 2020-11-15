# La loire à velo

## Note au professeur

Ce qu'il y a à rendre pour chaque semaine sera sur une branche séparer (quand je le rendrai le projet sera correctement checkout). En plus de l'envoyer par Teams, le projet est disponnible sur [Github](https://github.com/Superkooka/loire-a-velo) en priver. Envoyez-moi votre usename que je puisse vous y invitez. La branch principal et ma branch perso avec quelques features ainsi que outils en plus.

## Presentation du projet

*C'est un projet de cours réaliser durant mon premier trimestre de premiere spécialité NSI*

Ce projet de cours est réalisé entre le 3 Novembre 2020 et 1er Decembre 2020. Le but est, comme indiquer dans le PDF de ``tools/support-de-cours`` est de réaliser un petit site web pour un site d'hebergement de gites autour de la Loire. L'objectif est de concevoir un formulaire de réservation et sauvegarder les données dans un fichier texte sur le serveur. Il faudra aussi rendre 3 documents, un sur les base de l'HTML, un autre sur les bases du JS et un dernier sur une introduction à PHP.

## Organisation du projet

Le suit pour le moment une architecture assez simple. La racine étant le dossier public, le seul fichier de style et le seul fichier de javascript sont dans ``assets``. Dans ``tools`` il y a les supports de cours + la maquette figma. Les fichiers html dans à la racine.
```
├───assets
└───tools
    ├───figma
    └───support-de-cours
```

## Mise en route du projet

Pour lancer le projet dans votre environnement de developpement vous aurez besoin de docker ainsi que docker-compose ou alors :

- Makefile (recommander)
- NodeJS avec NPM (obligatoire pour le build des assets)
- PHP >= 7.4 avec Composer (obligatoire pour faire tourner le back)

## Outils

La maquette est disponnible sur [Figma](https://www.figma.com/file/UqCC0zP1vEjY7tTGodFdLQ/la-loire-a-velo?node-id=0%3A1)

## TO DO

Base minimal pour par rapport au cahier des charges : 

- Utilisation du JavaScript pour gérer les évènements du formulaire 
- Récuperation des données dans un fichier texte au niveau du serveur
- Redirection sur une page avec le récapitulatif des données envoyer

Pour aller plus loin :

- ~~Gestion du responsive~~

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

Deployement du projet (si j'ai le temps + l'envie : ansible)