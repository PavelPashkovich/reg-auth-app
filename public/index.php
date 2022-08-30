<?php

include '../vendor/autoload.php';
include '../app/core.php';

$routes = [
    '/' => [App\Controllers\MainController::class, 'index'],
    '/login' => [App\Controllers\LoginController::class, 'index'],
    '/register' => [App\Controllers\RegisterController::class, 'index'],
    '/add-user' => [App\Controllers\UserController::class, 'addUser'],
    '/check-user' => [App\Controllers\UserController::class, 'checkUser'],
    '/logout' => [App\Controllers\LogoutController::class, 'index'],
    '/profile' => [App\Controllers\ProfileController::class, 'index'],
    '/delete-user' => [App\Controllers\UserController::class, 'deleteUser'],
    '/edit-user' => [App\Controllers\EditController::class, 'index'],
];

$runAction = [App\Controllers\MainController::class, 'notFound'];

foreach ($routes as $route => $action) {
    if ($_SERVER['REQUEST_URI'] == $route) {
        $runAction = $action;
    }
}

$controller = new $runAction[0];
$controller->{$runAction[1]}();