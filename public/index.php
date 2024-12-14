<?php

require '../vendor/autoload.php'; // Charger AltoRouter via Composer

$router = new AltoRouter();
define('VIEW_PATH', dirname(__DIR__) . '/views');

// Définir les routes
$router->map('GET', '/blog', function() {
    require VIEW_PATH . '/layout/header.php';
    require VIEW_PATH . '/post/index.php';
    require VIEW_PATH . '/layout/footer.php';
}, 'blog');

$router->map('GET', '/adminer', function() {
    require VIEW_PATH . '/layout/header.php';
    require __DIR__ . '/adminer.php';
    require VIEW_PATH . '/layout/footer.php';
}, 'adminer');

$router->map('GET', '/blog/category', function() {
    require VIEW_PATH . '/layout/header.php';
    require VIEW_PATH . '/category/show.php';
    require VIEW_PATH . '/layout/footer.php';
}, 'category');


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
