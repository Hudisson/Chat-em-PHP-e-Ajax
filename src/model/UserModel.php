<?php

namespace App\model;

use App\model\Database;

/**
 * Classe para gerenciar @querys SQL dos usuário com a base de dados
 */
class UserModel extends Database
{

    /**
     * Método responsável por inserir um novo usuário na tabela do banco de dados
     * @param array $data
     * @return boolean
     */
    public static function save(array $data)
    {
        $pdo = self::getConnnection();

        $stmt = $pdo->prepare("
        INSERT INTO tb_users_chatapp (user_name, user_email, user_password, termos_de_uso)
        VALUES (?, ?, ?, ?)");
   
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
            $data['termo']
        ]);
       

        return $pdo->lastInsertId() > 0 ? true : false;
    }

}