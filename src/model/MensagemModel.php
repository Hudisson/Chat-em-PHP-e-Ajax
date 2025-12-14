<?php

namespace App\model;

use App\model\Database;

class MensagemModel extends Database
{
    public static function saveMessage(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
        INSERT INTO tb_chat_chatapp (remetente, destinatario, mensagem)
        VALUES (?, ?, ?)");

        $stmt->execute([
            $data['remetente'],
            $data['destinatario'],
            $data['mensagem'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function getMensagens(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT * FROM tb_chat_chatapp 
            WHERE remetente IN (?, ?) 
            AND destinatario IN (?, ?) 
            AND remetente != destinatario;
        ");

        $stmt->execute([
            // Para o remetente IN (?, ?)
            $data['id_user'],
            $data['id_friend'],

            // Para o destinátario IN (?, ?)
            $data['id_user'],
            $data['id_friend'],
        ]);

        if ($stmt->rowCount() < 1) return [];

        $msg = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $msg;
    }
}
