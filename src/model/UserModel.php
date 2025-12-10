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
        $pdo = self::getConnection();

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

    /**
     * Método par asalvar o caminho da imagem no banco de dados
     */
    public static function uploadPhotoProfile($caminhoDaImagem, $id_usuario){

        $data = ['photo'=>$caminhoDaImagem, 'id_usuario'=>$id_usuario];

        $pdo = self::getConnection();
        
        $stmt = $pdo->prepare("
            UPDATE tb_users_chatapp SET photo_profile = ? WHERE user_id = ?
        ");

        $stmt->execute([
            $data['photo'],
            $data['id_usuario'],
        ]);

       return $stmt->rowCount() > 0;
        
    }

    public static function getPhotoProfile($id_usuario)
    {
        $data['id'] = $id_usuario;

        $pdo = self::getConnection();
        $stmt = $pdo->prepare("SELECT photo_profile FROM tb_users_chatapp WHERE user_id = ?");
        $stmt->execute([$data['id']]);

        if ($stmt->rowCount() < 1) return ['erro' => 'Descupe, não foi possível carrega a foto de perfil'];

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);


        return $user['photo_profile'];
    }

}