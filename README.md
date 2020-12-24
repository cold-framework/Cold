# Coldbolt



## Presentation du projet

Coldbolt est un petit framework PHP sans grande prétention. Il utilise absolument aucune dependance et il est même fourni avec son propre autoloader !. Le projet est parfaitement utilisable pour des petits et moyens projets. Coldbolt possède [une documentation](./docs/README.md) complète pour le moment uniquement en français. Les composants majeurs de Coldbolt sont: 

- Un composant HTTP (routing + objet request et response PSR7 compilant) 
- Un composant de Validation
- Un composant de Unit Testing
- Un composant de Template
- Un composant d'Autowiring (Conteneur de service avec résolution des dépendances)
- Un composant de Traduction
- Un composant de Console (WIP)
- Un composant de Cache (WIP)
- Une gestion des sessions (WIP)

## Lancer le projet

Pour lancer le projet vous aurez besoin de PHP >= 8 ! C'est le seul prérequis. Il suffira alors de lancer `php -S 127.0.0.1:8000 -t public/` puis vous rendre sur `127.0.0.1:8000` dans le navigateur pour voir le projet ! Pour le deployer une configuration ansible est fournis.

## Organisation du projet

Le projet est divisé en divers dossier assez explicite. `app` contient les sources du projets, `bin` les fichiers executable tel celui pour lancer les tests, le `docs` la documentation, `public` les ressources publiques, `src` le code source du framework, `templates` les templates, `tools` contient divers fichier la configuration pour déployer etc.... Le dossier `var` contient toute les données écrivable par le site tel que des logs ou juste des données. Il doit pouvoir être écrivable par l'application.

```
├───app
│   └───Controller
├───bin
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

## Deployer le projet

Le projet est facilement deployable avec ansible et ansistrano. Pour cela il vous faudrait executer deux commandes afin d'installer les dépendances:

- `ansible-galaxy install ansistrano.deploy ansistrano.rollback`

Ensuite il vous faudra simplement importer votre clé et modifier le fichier `tools/ansible/hosts` . Ensuite vous pouvez lancer la configuration du serveur avec `ansible-playbook -i tools/ansible/hosts tools/ansible/install.yml` et lancer le deploiement `ansible-playbook -i tools/ansible/hosts tools/ansible/deploy.yml`
