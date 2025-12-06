<?php

namespace App\model;

use App\model\Database;

class LoginModel extends Database
{

    /**
     * Método responsável pela autenticação do usuário com a base de dados 
     * @param $data (array com as credenciasi - email e senha)
     * @return array com as informação do usuário logado
     */
    public static function autentication(array $data)
    {


        $pdo = self::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM tb_users_chatapp WHERE user_email = ?");
        // user_email, user_password

        $stmt->execute([$data['email']]);

        if ($stmt->rowCount() < 1) return ['erro' => 'Descupe, conta inválida ou inesistente'];

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!password_verify($data['password'], $user['user_password'])) return ['erro' => 'Descupe, conta inválida ou inesistente'];

        return [
            'id'    => $user['user_id'],
            'name'  => $user['user_name'],
            'email' => $user['user_email'],
            'status' => $user['user_status'],
            'fotoPerfil' => $user['photo_profile'],
        ];
    }
}
