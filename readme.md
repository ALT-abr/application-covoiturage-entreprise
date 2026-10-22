# Application de covoiturage entreprise

Application PHP permettant d'afficher plusieurs requêtes SQL sur une base de données de covoiturage.

## Installation

### 1. Démarrer XAMPP

Lancer XAMPP, puis démarrer les services Apache et MySQL.

### 2. Importer la base de données

1. Ouvrir [phpMyAdmin](http://localhost/phpmyadmin).
2. Créer une base de données, par exemple `covoiturage`.
3. Ouvrir cette base, puis aller dans **Importer**.
4. Sélectionner `sql/covoiturage_entreprise.sql`.
5. Cliquer sur **Importer**.

Le dossier `sql` contient également le PDF présentant les requêtes SQL demandées.

### 3. Configurer la connexion

Copier `config.exemple.php` et renommer la copie en `config.php`.

Ouvrir `config.php` et renseigner les informations de connexion à MySQL :

```php
<?php
return [
    'host' => 'localhost',
    'dbname' => 'covoiturage',
    'user' => 'root',
    'password' => '',
];
```

Si MySQL possède un mot de passe, remplacer la valeur vide de `password` par celui-ci.

Le fichier `config.php` est ignoré par Git afin de ne pas publier les identifiants de connexion.

## Utilisation

Placer le projet dans le dossier `htdocs` de XAMPP, puis ouvrir une page dans le navigateur :

```text
http://localhost/application-covoiturage-entreprise/requete1.php
```

Le menu en haut de chaque page permet d'accéder aux différentes requêtes.

## Structure principale

```text
application-covoiturage-entreprise/
├── config.php
├── config.exemple.php
├── connexion.php
├── CSS/style.css
├── requete1.php
├── requete3.php
├── requete4.php
├── requete5.php
└── sql/
    └── covoiturage_entreprise.sql
```
