<?php

namespace App\Controllers;

use League\Plates\Engine;


class BaseController
{


    public $redirect = "/home";
    /**
     * View Engine
     * 
     * @var \League\Plates\Engine;
     */
    public $view;


    public function __construct()
    {
        $this->init();

        if (!$this->authorize()) {
            redirect($this->redirect);
        }
    }

    public function authorize()
    {
        return true;
    }

    public function init()
    {
        $this->view = new Engine(config('view.path'));
    }

    public function render($path, $Data =[])
    {
        echo $this->view->render($path,$Data);
    }

}
