<?php

namespace App\controller;

use App\utils\RenderView;

class NotFoundController extends RenderView
{
    public function index()
    {
       
        $this->loadView("404NotFound", [
            "title" => "404 - Not Found",
        ]);

         
    }

}