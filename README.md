# Note

Pour lancer le serveur de développement de Laravel 

```shell
php artisan serve
```
# Routes

Les routes de l'application sont définis dans le folder `/routes`.

On retrouve deux fichiers :
- `console.php`
- `web.php`

Dans le fichier `web.php`, on pourras venir y définir les routes de notre applications.
```php
Route::get('/', function () {
    return view('welcome');
});
```

- `get()` : méthode qui permet de créer une route GET
- `'/'`: le path de la route
- `function()` : fonction anonyme déclencher lorsque la requête arrive sur ce path
- `return view()` : méthode qui permet de render la view
- `'welcome"`: c'est le fichier qui doit être afficher

Les différentes views sont stocker dans le folder `/ressources/views/`. C'est dans ce folder que l'on viendras stocker les fichiers de views.

Laravel utilise le moteur `blade` pour définir les views. Il devront avoir une extension `<file_name>.blade.php`

## Déclarer une nouvelle route

Dans le fichier `web.php`, on viens utiliser les méthodes pour définir une nouvelle route. On définis un path, et la fonction qui nous permet d'appeller le fichier de template.
```php
Route::get('/about', function () {
    return "about page";
});
```
Dans cet exemple, la page retourne une simple string.

Il sera possible de venir directement retourne une réponse en JSON en retournant un array. Cette réponse est automatiquement convertis en JSON. 
```php
Route::get('/about', function () {
    return ["foo" => "bar"];
});
```

Pour rendre une nouvelle view, on utilise : 
```php
Route::get('/', function () {
    return view('welcome');
});
```

# Layout with Laravel Composant

Pour mettre en place les layout, on viens utiliser le moteur de template de Laravel `Blade`.

On viendras créer un nouveau folder `/views/Components/`. Attention de bien respecter le nom.

Dans ce nouveau folder, on pourras venir y placer un fichier `layout.blade.php`. Ce fichier permets de définir le layout global de notre application.

Dans les fichier qui permettent de définir les `views` qui sont placé à la racine du folder `/views/`, on viendras faire référence au `layout` pour l'importer.

Pour faire référence à un composant, on utiliser la balise `<x-<file_name>></x-<file_name>>`. Entre les balises, on viens définis le code spécifique à la page.
```php
// home.blade.php
<!-- on vient faire référence au layout par son nom -> layout faire référence au fichier /Components/layout/blade.php -->
<x-layout>
// contenu spécifique à la page
    <h1>Home page</h1>
</x-layout>
```

Dans le fichier de layout, il faudras ensuite venir définir ou le contenu spécfique de la page doit être ajouter :
```php
/views/components/layout/blade.php
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>
    </head>
    <body>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
        <?php echo $slot ?> -> ici on viendras afficher le contenu spécfique de la page qui appelle le layout
    </body>
</html>
```
## Blade Helper

Blade fournit des outils pour simplifier le code. Par exemple `{{ $slot }}` equivaut à faire `<?php echo $slot ?>`

## Passage de donnée à un composant 

Dans le composant enfant, on pourras venir utiliser le `$slot` pour afficher le contenu passer dans les balises depuis le composant parent.

On pourras également utiliser `$attributes` qui convertis automatiquement en un objet dans le composant enfant, les attributs que l'on passer depuis le parent.
Laravel convertis automatiquement cet objet en string, qui sera ainsi interpréter.

```php
//composant enfant 
<a {{ $attributes }}>{{ $slot }}</a>
```
- `$attributes` : permet de récupérer les attributs passer depuis le parent
- `$slot` : permet de récupérer les valeurs passer entre les balises depuis le parent

- Et depuis le composant parent 
```php
<x-nav-link href="/">Home</x-nav-link>
```
- `href`: sera automatiquement récupérer par `$attributes`
- `Home`: sera automatiquement récupérer par `$slot`

# Tailwind

