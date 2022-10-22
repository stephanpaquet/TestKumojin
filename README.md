# Test Kumojin

https://laraveldaily.com/post/laravel-8-vue-3-crud-composition-api

## Application de gestion d’événements

### L’objectif est d’avoir une application basique de gestion des événements.

Un événement est caractérisé par son

- nom (32 caractères maximum),
- sa description et
- ses dates de début
- et de fin.
- Attention, les événements peuvent avoir lieu n’importe où dans le monde, n’oublie pas de prendre en compte la
  timezone.

### Le back-end est une API REST qui retourne du JSON. Il doit gérer les opérations suivantes :

- Créer un événement
- Lister les événements

### Le front-end doit permettre de :

- Créer un événement
- Lister les événements (optionnel)

Considère que cette application est la base d’un nouveau produit et qu’il faut qu’elle soit codée dans les règles de
l’art
(intégration de tests pertinents sur les variables pour le back et le front).
Tu peux bien entendu faire des compromis sur l’implémentation mais sois prêt à en discuter et à les justifier.

## Installation

```
git clone git@github.com:stephanpaquet/TestKumojin.git
cd TestKumojin
composer install
cp .env.example .env
php artisan key:generate

npm install
npm run production

php artisan migrate:fresh --seed

php artisan serve 
```

## Créer une base de données avec le nom kumojin

```
create database kumojin;
```

## Démarrer le serveur

```
php artisan serve
```

## Seed des données

```
php artisan migrate:fresh --seed
```

## Version de Laravel: 8.83.25

## Rouler les tests

```
./vendor/bin/phpunit --testdox
```

## Gestion du Timezone

Pour ce qui est d'avoir une date et heure d'événement selon un certain timezone du lieu de l'événement.

- J'ai choisi d'insérer la date et heure dans le timezone UTC
- Et d'ajouter une colonne timezone avec un nombre soit négatif ou positif selon le timezone de l'événement
- Par la suite on utilise un **accesssor** dans le model, qui va soit soustraire ou additionner le nombre d'heures selon
  la valeur de
  son timezone
- Il faudra que l'heure du serveur de l'application soit en UTC bien sûr
- Le test unitaire prend en compte cette logique
