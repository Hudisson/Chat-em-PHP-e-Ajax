<?php

namespace App\service;

use App\model\MensagemModel;

class MensagemService
{
  
    /**Método responsável por enviar as mensagens */
    public static function sendMensage($id_remetente, $id_destinatario, $mensagem)
    {
        // Verificar se os campos da mensagem foram preenchidos
        if(empty($id_destinatario) || empty($id_remetente) || empty($mensagem)){
            return null;
        }

        // Chama a model para salvar a mensagem no banco de dados
        try{

            # Adciona os dados em um array
            $data = [
                'remetente'    => $id_remetente,
                'destinatario' => $id_destinatario, 
                'mensagem'     => $mensagem,
            ];

            MensagemModel::saveMessage($data);

            return ['sucesso' => 'Mensagem enviada'];
        
        }catch(\Exception $e){
            return ['erro' => $e->getMessage()];
        }
        
    }

    /**Método responsável por obter as mensagns */
    public static function getMensagens($id_user, $id_friend)
    {
        $data = [
            'id_user' => $id_user,
            'id_friend' => $id_friend,
        ];

        // Chama a model
        $msg = MensagemModel::getMensagens($data);

        return $msg;
    }

   
}