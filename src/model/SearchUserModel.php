<?php

namespace App\model;

use App\model\Database;

class SearchUserModel extends Database
{
    public static function getUsersLogado($id_usuario)
    {
        $data['id'] = $id_usuario;

        $pdo = self::getConnection();

        $stmt = $pdo->prepare("SELECT user_id, user_name, photo_profile, user_online FROM tb_users_chatapp WHERE user_id != ?");
        $stmt->execute([$data['id']]);

        if ($stmt->rowCount() < 1) return [];

        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }
}

// AND user_online = 'online'