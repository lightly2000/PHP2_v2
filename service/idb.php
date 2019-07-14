<?php
namespace app\service;
interface IDB
{
    public function find(string $sql);
    public function findAll(string $sql);
}