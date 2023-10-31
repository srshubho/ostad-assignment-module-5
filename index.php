<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/' => 'login.php',
    '/login' => 'login.php',
    '/register' => 'register.php',
];
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    require '404.php';
}