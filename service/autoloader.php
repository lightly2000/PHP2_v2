<?php
namespace app\service;

class Autoload
{
  public function loadclass($className)
  { 
    //var_dump($className);
    $appDel = str_replace('app\\','',$className);
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$appDel);
    $file = $_SERVER['DOCUMENT_ROOT'] . "/../{$fileName}.php";
    include $file;
  }
}