<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->render('home/index');
    }
    public function product()
    {
        return $this->render('product/index');
    }
    public function login()
    {
        return $this->render('auth/login');
    }
    public function register()
    {
        return $this->render('auth/register');
    }
}