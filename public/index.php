<?php

require '../vendor/autoload.php'; // Charger AltoRouter via Composer

$router = new AltoRouter();

// Définir les routes
$router->map('GET', '/', function() {
    require __DIR__ . '/views/home.php';
}, 'home');

$router->map('GET', '/about', function() {
    require __DIR__ . '/views/about.php';
}, 'about');

$router->map('GET', '/user/[i:id]', function($id) {
    require __DIR__ . '/views/user.php';
}, 'user-profile');

// Correspondre la requête entrante avec une route définie
$match = $router->match();

if ($match) {
    // Appeler la cible avec les paramètres
    call_user_func_array($match['target'], $match['params']);
} else {
    // Aucune route trouvée
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo 'Page not found';
}
