<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../services/autoloader.php';
use \App\services\Autoload;
use \App\models\User;


spl_autoload_register([new Autoload(), 'loadclass']);

$user = new User("Mark", "Mark3", 3);
//var_dump($user);
$user->getProperties();
$user->create();

/* var_dump($user->getOne(1));
var_dump($user->getAll());

$user->getProperties(); */



