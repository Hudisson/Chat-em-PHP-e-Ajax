<?php

namespace App\service;

use App\model\LoginModel;



class LoginService
{

    public static function login(array $data)
    {

        try {

            $user = LoginModel::autentication($data);
            if (!$user) return ['error' => 'Desculpe, não foi possível autenticá-lo(a)'];

            return $user;
            
        } catch (\PDOException $e) {

            if ($e->errorInfo[0] === 'HY000') return ['error' => "Desculpe, não foi possível conectar ao banco de dados."];
            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
