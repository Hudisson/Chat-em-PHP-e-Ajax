<?php

namespace App\controller;

use App\utils\RenderView;

class LoginController extends RenderView
{

    public function index()
    {
        $this->loadView("login",[
            'title' => "Login",
            'APP_URL' =>  getenv('APP_URL'),
        ]);

    }
}