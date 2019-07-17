<?php
namespace App\models;

use App\services\BD;
use App\services\IBD;

abstract class Model
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bd = BD::getInstance();
    }

    public function userMade ($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }


    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->bd->find($sql, [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->bd->findAll($sql);
    }

    /**
     * Создание записи в таблице
     * @return
     */
    public function create($name, $login, $password)
    {   
        $this->userMade($name, $login, $password);
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} (name, login, password) VALUES (
            :name,
            :login,
            :password)";
        $prop = $this->getProperties();
        $this->bd->execute($sql,$prop);

    }
    
    /**
     * Удаление записи в таблице по id
     * @return
     */
    public function delete($id)
    {   
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        var_dump($id);
        $this->bd->execute($sql, [':id' => $id]);
    }



}
