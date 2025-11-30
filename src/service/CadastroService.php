<?php

namespace App\service;

use App\model\UserModel;

class CadastroService
{

    /**
     * Método resposável por criar um novo usuário
     * @param array $data
     * @return array
     */
    public static function createUser(array $data)
    {

       try{

            $data['termos'] = "aceito";

           # Encripta a senha enviada antes de salvar na base de dados
           $data['password']  = password_hash($data['password'], PASSWORD_DEFAULT);
            
            $user = UserModel::save($data);

            if(!$user) return ['erro' => "Sorry, we could not create your account."];
            return ['sucesso'=> "Conta criada com sucesso"];
    
        } catch (\PDOException $e) {

            if($e->errorInfo[0] === 'HY000') return ['erro' => "Descupe, não foi possível conectar a base de dados."];
            if($e->errorInfo[0] === '23000') return ['erro' => "Descupe, esse usuário já existe na base de dados."];

            return ['erro' => $e->getMessage()];
        
        } catch ( \Exception $e){
            return ['erro' => $e->getMessage()];
        }
        
    }


}