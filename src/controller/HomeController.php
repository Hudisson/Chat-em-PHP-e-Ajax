<?php

namespace App\controller;

use App\utils\RenderView;

class HomeController extends RenderView
{

    private $photoProfile = [];

    public function index()
    {
        $this->loadView("home", [
            'title' => "Home Page",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }

    public function settings()
    {
        $this->loadView("settings", [
            'title' => "Configurações",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }

    public function uploadPhotoProfile()
    {

        if (empty($this->photoProfile['name'])){
            return ['erro' => 'Descupe, nenhum arquivo selecionado. Escolha um arquivo [jpg/jpeg, png] para upload'];
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $imageFileType = strtolower(pathinfo($this->photoProfile['name'], PATHINFO_EXTENSION));

        # Verifica se o arquivo não é maior que 200.000 bytes
        if ($this->photoProfile["size"] > 200000) {
            return ['erro' => 'Descupe, o arquivo não deve ser maior que 200.000 bytes'];
        }

        # Verifica o formato do arquivo.
        if (!in_array($imageFileType, $allowed_extensions)) {
            return ['erro' => "Descupe, Formato de arquivo inválido <b>$imageFileType</b> só é permitido arquivos no formato [jpg/jpeg e png]"];
        }

        return ['sucesso'=> "sucesso"];

    }


    public function setPhotoProfile(array $file)
    {
        $this->photoProfile = $file;
    }
}
