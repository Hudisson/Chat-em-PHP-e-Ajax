<?php

namespace App\service;

use App\model\SearchUserModel;

class UsuarioLogadoService
{
    public static function getUsersLogado($id)
    {
        try{
            // Acessa a model
            $usersLogado = SearchUserModel::getUsersLogado($id);

            return $usersLogado;

        
        }catch(\Exception $e){
            return ['erro' => $e->getMessage()];
        }
    }
}