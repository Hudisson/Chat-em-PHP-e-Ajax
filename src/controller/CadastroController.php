<?php

namespace App\controller;

use App\utils\RenderView;

class CadastroController extends RenderView
{
     /**
     * Método resposável por retorna a página de cadastro
     */
    public function index()
    {
        $this->loadView("cadastro",[
            'title' => "Cadastrar-se no Chat",
            'APP_URL' =>  getenv('APP_URL'),
        ]);

    }

    /**
     * Método resposável por retorna a página de termos de serviço
     */
    public function termosDeServico()
    {
        $this->loadView("termosDeServico",[
            'title' => "Termos de Serviço",
            'APP_URL' =>  getenv('APP_URL'),
        ]);

    
    }
}