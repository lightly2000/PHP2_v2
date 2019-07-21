<?php
namespace App\controllers;

use App\models\User;

class UserController
{
    protected $defaultAction = 'users';
    protected $action;
    protected $defaultIdName = '2';
    protected $idName;

    public function run($action, $idName)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->idName = $idName ?: $this->defaultIdName;
            $this->$method();
        } else {
            echo '404';
        }
    }

    public function userAction()
    {
        $params = [
            'user' =>  User::getOne($this->idName)
        ];

        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
          'users' =>  User::getAll()
        ];

        echo $this->render('users', $params);
    }

    public function render($template, $params = [])
    {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', [
            'content' => $content
        ]);
    }

    public function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/../views/' . $template . '.php';
        return ob_get_clean();
    }
}