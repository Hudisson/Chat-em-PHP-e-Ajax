<?php

namespace App\controller;

use App\utils\RenderView;

class HomeController extends RenderView
{
    public function index()
    {
        $this->loadView("home",[
            'title' => "Home Page",
        ]);

    }
}