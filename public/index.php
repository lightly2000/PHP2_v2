<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../service/autoloader.php';
use app\service\Autoload;
use app\models\User;
use app\service\DB;

spl_autoload_register([new Autoload(), 'loadclass']);

$user = new User(new DB());
$user->getOne('12');



