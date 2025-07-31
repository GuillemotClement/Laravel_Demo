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
<!--        Fait référence au contenu de la page qui utilise le layout-->
<!--     Syntaxe longue   --><?php //echo $slot ?>
<!--        Syntaxe courte -> helper Blade-->
    {{ $slot }}
    </body>
</html>
