<?php


require '../vendor/autoload.php'; // Charger AltoRouter via Composer

$router = new App\Router(dirname(__DIR__) . '/views');
$router->get('/blog', 'post/index','blog');
$router->get('/blog/category', 'category/show','category');
$router->run();
