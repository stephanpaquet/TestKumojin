# Test Kumojin

## Application de gestion d’événements

### L’objectif est d’avoir une application basique de gestion des événements.

Un événement est caractérisé par son 
- nom (32 caractères maximum), 
- sa description et 
- ses dates de début 
- et de fin.
- Attention, les événements peuvent avoir lieu n’importe où dans le monde, n’oublie pas de prendre en compte la timezone.

### Le back-end est une API REST qui retourne du JSON. Il doit gérer les opérations suivantes :

- Créer un événement
- Lister les événements

### Le front-end doit permettre de :
- Créer un événement
- Lister les événements (optionnel)


Considère que cette application est la base d’un nouveau produit et qu’il faut qu’elle soit codée dans les règles de l’art
(intégration de tests pertinents sur les variables pour le back et le front). 
Tu peux bien entendu faire des compromis sur l’implémentation mais sois prêt à en discuter et à les justifier.


## Installation
```
git clone git@github.com:stephanpaquet/TestKumojin.git
cd TestKumojin
composer install
cp .env.example .env
php artisan key:generate

php artisan serve 
```

## Version de Laravel: 8.83.25

## Rouler les tests
```
./vendor/bin/phpunit --testdox
```
