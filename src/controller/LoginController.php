<?php

namespace App\controller;

use App\service\LoginService;
use App\utils\RenderView;

class LoginController extends RenderView
{

    private $email;
    private $senha;

    public function index()
    {
        $this->loadView("login", [
            'title' => "Login",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }


    /**Método responsável pelo logindo usuário */
    public function login()
    {


        // 1. Verificar se os campos são vazios
        if (empty($this->email) || empty($this->senha)) {
            return ["erro" => "Preencha todos os campos"];
        }

        // 2. Adciona todos os campos ao array $data
        $data = [
            'email'      => $this->email,
            'password'   => $this->senha,
        ];

        // 3. Envia o array $data para a Classe de LoginService de usuário
        $loginService = LoginService::login($data);

        return $loginService;
    }

    /**===========================Sets========================= */

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    /**Sair */ 
    public function logout()
    {

        $this->loadView("sair", [
            'title' => "Sair",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    
    }

}
