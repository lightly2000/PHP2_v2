<?php
namespace App\models;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    protected function getTableName()
    {
        return 'user';
    }

    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;

    }

   public function getProperties()
    {
        $properties = [];
        foreach ($this as $key => $value)
        {
            $properties[] = $key;
        }
        //var_dump($properties);
    }

    public function getPropertiesToSave()
    {
        return [$this->name, $this->login, $this->password];
    }
}
