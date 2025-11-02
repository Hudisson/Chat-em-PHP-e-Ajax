<?php

namespace App\controller;

use App\utils\RenderView;

class CadastroController extends RenderView
{
    public function index()
    {
        $this->loadView("cadastro",[
            'title' => "Cadastrar-se no Chat",
        ]);

    }
}