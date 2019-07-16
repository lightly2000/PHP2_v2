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
    public function create()
    {
        $prop = $this->getPropertiesToSave();
        //var_dump($prop);
        //$placeholders = str_repeat(',?', count($prop));
        //var_dump($placeholders);
        $sql1 = "INSERT INTO `{$this->getTableName()}` (`name`, `login`, `password`)
            VALUES (
                '{$prop[0]}', 
                '{$prop[1]}', 
                '{$prop[2]}');";
        var_dump($sql1);
        $sql2 = "SELECT LAST_INSERT_ID() as id";
        //var_dump($sql1, $sql2);
        $this->bd->execute($sql1, $prop);
        $this->id = $this->bd->queryOne($sql2);
    }
    
    /**
     * Удаление записи в таблице по id
     * @return
     */
    public function delete()
    {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";
        $this->bd->execute($sql, ['id' => $this->id]);
    }


}
