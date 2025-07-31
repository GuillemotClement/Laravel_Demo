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
