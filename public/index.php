<?php
include $_SERVER['DOCUMENT_ROOT'] .
    '/../vendor/autoload.php';
$request = new \App\services\Request();

//try{
//    $request->getError();
//} catch (\App\services\newException $e) {
//    $e->dumpError();
//} catch (Exception $e) {
//    $e->getMessage();
//}

$controllerName = $request->getControllerName() ?: 'user';
$actionName = $request->getActionName();

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(
        new \App\services\renders\TwigRenderServices(),
        $request
    );
    $controller->run($actionName);
}

//$loader = new \Twig\Loader\ArrayLoader([
//    'index' => 'Hello {{ name }}!',
//]);
//$a = new \Twig\Environment($loader);






