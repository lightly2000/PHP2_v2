<?php
namespace app\service;
class DB implements IDB 
{
    public function find(string $sql)
    {
        echo $sql;
    }

    public function findAll(string $sql)
    {
        return $sql;
    }
}