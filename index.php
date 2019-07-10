<?php

class Point
{
  public $id;
  public $name;
  public $city;

  public function __construct($id, $name, $city)
  {
    $this->id = $id;
    $this->name = $name;
    $this->city = $city;
  }


  public function display()
  {  
    //echo 'it`s working';
    $pointView = <<<php
    <h4>{$this->id}</h4>
    <h2>{$this->name}</h2>
    <i>{$this->city}</i>
php;
    echo $pointView;
  }

}

class PointSetting extends Point
{
  public function __construct($id, $name, $city, $numberStudio, $totalSquare)
  {
    parent::__construct($id, $name, $city);
    $this->numberStudio = $numberStudio;
    $this->totalSquare = $totalSquare;
  }

  public function display()
  {
    $point = parent::display();
    $setting = <<<php
    <p>Количество залов: {$this->numberStudio}<br>Общая площадь: {$this->totalSquare}</p>
php;
    echo $setting;
  }

}


$point = new Point(101, 'Super-Puper', 'Moscow');

$point->display();

$pointWithSetting = new PointSetting(102, 'New Studio', 'Sahalin', 4, 250);

$pointWithSetting->display();