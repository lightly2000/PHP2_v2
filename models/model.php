<?php
namespace app\models;
abstract class Model
{
  protected $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  abstract protected function getTableName();

  public function getOne($id)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
    $this->db->find($sql);
    return [];
  }

  public function getAll()
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName}";
  }

}

