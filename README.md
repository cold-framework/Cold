# La loire à velo

## Presentation du projet

*C'est un projet de cours réaliser durant mon premier trimestre de premiere spécialité NSI*

Ce projet de cours est réalisé entre le 3 Novembre 2020 et 1er Decembre 2020. Le but est, comme indiquer dans le PDF de ``tools/support-de-cours`` est de réaliser un petit site web pour un site d'hebergement de gites autour de la Loire. L'objectif est de concevoir un formulaire de réservation et sauvegarder les données dans un fichier texte sur le serveur. Il faudra aussi rendre 3 documents, un sur les base de l'HTML, un autre sur les bases du JS et un dernier sur une introduction à PHP

## Organisation du projet

Le suit pour le moment une architecture assez simple. La racine étant le dossier public, le seul fichier de style et le seul fichier de javascript sont dans ``assets``. Dans ``tools`` il y a les supports de cours + la maquette figma. Les fichiers html dans à la racine.
```
├───assets
└───tools
    ├───figma
    └───support-de-cours
```

## TO DO:

Base minimal pour par rapport au cahier des charges: 

- Utilisation du JavaScript pour gérer les évènements du formulaire 
- Récuperation des données dans un fichier texte au niveau du serveur
- Redirection sur une page avec le récapitulatif des données envoyer

Pour aller plus loin:

- Gestion du responsive
- Gestion des éléments du formulaire avec Preact
- Utilisaiton d'un makefile pour simplifier toute les commandes
- Backend avec Symfony
- Utilisation de Vite.JS pour les assets dans l'env de dev
- Utilisation de Rollup pour les assets dans l'env de prod
- Mise en place d'un petit backoffice avec un systeme de notification (ws sur le site + mail) pour l'admin
- Mise en place de GitHub Action pour le CI
- Utilisation de linter twig/php/css/js
- Ecriture de deux trois tests unitaire
- Dockerisation du projet
- Deployement du projet (si j'ai le temps + l'envie: ansible)
