<?php
namespace App\controllers;

use App\models\Good;

class GoodController
{
    protected $defaultAction = 'goods';
    protected $action;
    protected $defaultIdName = '1';
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

    public function GoodAction()
    {
        $params = [
            'good' =>  Good::getOne($this->idName)
        ];

        echo $this->render('good', $params);
    }

    public function GoodsAction()
    {
        $params = [
          'goods' =>  Good::getAll()
        ];

        echo $this->render('goods', $params);
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