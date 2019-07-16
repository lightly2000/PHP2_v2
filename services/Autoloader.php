<?php
namespace App\services;

class Autoload
{
  public function loadclass($className)
  { 
    //var_dump($className);
    $appDel = str_replace('App\\','',$className);
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$appDel);
    $file = $_SERVER['DOCUMENT_ROOT'] . "/../{$fileName}.php";
    //var_dump($file);
    include $file;
  }
}