<?php
use  \App\models\User;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] .
    '/../vendor/autoload.php';


$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'];
$idName = $_GET['id'] ?: '2';

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->run($actionName, $idName);
}







