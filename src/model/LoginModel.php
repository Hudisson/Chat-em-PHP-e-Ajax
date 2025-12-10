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

        $userOline['online'] = 'online';
        $pdo = self::getConnection();

        # Atualizar de offline para online
        $query = $pdo->prepare("
            UPDATE tb_users_chatapp SET user_online = ? WHERE user_email = ?
        ");

        $query->execute([
            $userOline['online'],
            $data['email'],
        ]);

        $stmt = $pdo->prepare("SELECT * FROM tb_users_chatapp WHERE user_email = ?");
        // user_email, user_password

        $stmt->execute([$data['email']]);

        if ($stmt->rowCount() < 1) return ['erro' => 'Descupe, conta inválida ou inesistente'];

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!password_verify($data['password'], $user['user_password'])) {

            $userOline['online'] = 'offline';

            $query->execute([
                $userOline['online'],
                $data['email'],
            ]);

            return ['erro' => 'Descupe, conta inválida ou inesistente'];
        }

        return [
            'id'    => $user['user_id'],
            'name'  => $user['user_name'],
            'email' => $user['user_email'],
            'status' => $user['user_status'],
            'fotoPerfil' => $user['photo_profile'],
            'user_online' => $user['user_online'],
        ];
    }

    public static function sair(array $data)
    {

        $pdo = self::getConnection();

        # Atualizar de offline para online
        $stmt = $pdo->prepare("
            UPDATE tb_users_chatapp SET user_online = ? WHERE user_id = ?
        ");

        $stmt->execute([
            $data['online'],
            $data['id'],
        ]);


        return $stmt->rowCount() > 0;
    }
}
