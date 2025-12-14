<?php

namespace App\controller;

use App\utils\RenderView;
use App\service\SettingsService;

class HomeController extends RenderView
{

    private $photoProfile = [];
    private $idUsuario;

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

    public function buscaFotoPerfil()
    {
        $this->loadView("buscar-foto", [
            'title' => "Buscar foto de perfil",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }

    public function buscarLogados()
    {
        $this->loadView("buscar-logados", [
            'title' => "Buscar foto de perfil",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }

    public function buscarConversas()
    {
        $this->loadView("conversas", [
            'title' => "conversas",
            'APP_URL' =>  getenv('APP_URL'),
        ]);
    }

    public function uploadPhotoProfile()
    {

        if (empty($this->photoProfile['name'])){
            return ['erro' => 'Descupe, nenhum arquivo selecionado para upload'];
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

        # Chama o SettingService

        $settingService = SettingsService::uploadPhotoProfile($this->photoProfile, $this->idUsuario);

        return $settingService;

    }

    public function setPhotoProfile(array $file)
    {
        $this->photoProfile = $file;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->idUsuario = $id_usuario;
    }

}
