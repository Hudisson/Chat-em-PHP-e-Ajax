<?php

namespace App\controller;

use App\service\CadastroService;
use App\utils\RenderView;

class CadastroController extends RenderView
{

    private $nomeCompleto;
    private $email;
    private $senha;
    private $rsenha;
    private $termosContrato;

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

    /**
     * Método responsável por preparar o registro para um novo usuário
     * @return array
     */
    public function newUser(){

        // 1. Verificar se os campos são vazios
        if(empty($this->nomeCompleto) || empty($this->email) || empty($this->senha) || empty($this->rsenha)){
            return ["erro" => "Preencha todos os campos"];
        }

        if(is_null($this->termosContrato) || empty($this->termosContrato)){
            return ["erro" => "É preciso aceitar os termos de uso"];
        }
      
        // 2. Verificar se as senhas digitadas são iguais
        if($this->senha != $this->rsenha){
            return ["erro" => "As senhas são diferentes"];
        }

        // 3. Adciona todos os campos ao array $data
        $data = [
           'name'       =>  $this->nomeCompleto,
           'email'      => $this->email,
           'password'   => $this->senha,
           'termo'      => $this->termosContrato
        ];

        // 4. Envia o array $data para a Classe de cadatro de usuário
        $cadastroService = CadastroService::createUser($data);

        return $cadastroService; // retorna a resposta da Classe CadastroService
    }

    /**===========================Sets========================= */

    public function setNome($nome){
        $this->nomeCompleto = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setRsenha($rsenha){
        $this->rsenha = $rsenha;
    }

    public function setTermos($termos){
        $this->termosContrato = $termos;
    }
}