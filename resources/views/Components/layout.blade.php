<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>
    </head>
    <body>
        <nav>
<!--            On fait appelle au composant nav-link -->
<!--            le contenu passer dans les balise sera utiliser dans le composant -->
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/about" style="color: green">About</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link>
        </nav>
<!--        Fait référence au contenu de la page qui utilise le layout-->
<!--     Syntaxe longue   --><?php //echo $slot ?>
<!--        Syntaxe courte -> helper Blade-->
    {{ $slot }}
    </body>
</html>
