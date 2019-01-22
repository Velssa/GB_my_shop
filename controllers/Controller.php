<?php

namespace app\controllers;

use app\interfaces\IRenderer;


abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = "main";
    protected $useLayout = true;

    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if(method_exists($this, $method)){
            $this->$method();
        }else{
            http_response_code(404);
            $error = "Ошибка 404";
            echo $this->render("error", ['error' => $error]);
            die();
        }
    }

    protected function render($template, $params = []){
        if($this->useLayout){

            return $this->renderTemplate(
                "layouts/{$this->layout}", ['content' =>  $this->renderTemplate($template, $params)]
            );
        }
        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params = [])
    {
       return $this->renderer->render($template, $params);
    }
}