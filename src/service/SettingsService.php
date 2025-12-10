<?php

namespace App\service;

use App\model\UserModel;

class SettingsService
{
    public static function uploadPhotoProfile(array $data, $id_usuario)
    {
      
        try{

            $photoProfile = $data;

            # Caminho físico para move o qrquivo
            $pastaDestinoFisico = __DIR__ .'/../../resources/photosprofile';

            # Caminho relativo para salvar no banco de dados
            $pastaDestinoRelativa = 'photosprofile';

            # Nome e extensão da imagem
            $fileName = pathinfo($photoProfile['name'], PATHINFO_FILENAME);
            $extensao = pathinfo($photoProfile['name'], PATHINFO_EXTENSION);

            $temporario = $photoProfile['tmp_name'];
            $novoNome = $fileName."-".uniqid().".".$extensao;

            # Caminho final do arquivo
            $camnihoFisicoFinal = $pastaDestinoFisico . '/' . $novoNome;

            $camnihoRelativoFinal = $pastaDestinoRelativa . '/' . $novoNome;


            # Salvar o camniho da imagem no banco de dados
            $fotoDePerfil = UserModel::uploadPhotoProfile($camnihoRelativoFinal, $id_usuario);
            if(!$fotoDePerfil) return ['erro' => "Desculpe, não foi possível salva a imagem no banco de dados."];

            # Move do temp para a pasta de destino ($pastaDestino)
            if(!move_uploaded_file($temporario, $camnihoFisicoFinal)){
                return ['erro' => 'Não foi possível fazer upload'];
            }

            return ['sucesso' => 'Sucesso ao fazer upload'];
            
        
        }catch(\PDOException $e){

            if($e->errorInfo[0] === 'HY000') return ['erro' => "Descupe, não foi possível conectar a base de dados."];

        }catch ( \Exception $e){

            return ['erro' => $e->getMessage()];
        }
    }

    public static function getFotoDePerfil($id_usuario)
    {
        $fotoDePerfil = UserModel::getPhotoProfile($id_usuario);

        if(empty($fotoDePerfil)){
            return null;
        }

        return $fotoDePerfil;
    }
}