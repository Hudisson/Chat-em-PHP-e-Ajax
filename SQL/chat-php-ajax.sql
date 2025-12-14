/*Sistema de Chat em PHP e Ajax*/

/* 1 - Criar o banco de dados*/
create database if not exists chatapp;

/* 2 - Selecione o banco de dados criado*/
use chatapp;

/* 3 - Criar a tabela de usuários*/
create table if not exists tb_users_chatapp(
	user_id bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name varchar(250) NOT NULL,
    user_email varchar(250) UNIQUE NOT NULL,
    user_password varchar(250) NOT NULL,
    user_status ENUM('ativo', 'inativo') NOT NULL,
    user_online ENUM('online', 'offline') default 'offline',
    termos_de_uso ENUM('aceito', 'recursado') NOT NULL,
    photo_profile VARCHAR(500) default 'photosprofile/avatar.png',
    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/* 4 - Cria a tabela de mensagens*/
create table if not exists tb_chat_chatapp(
	chat_id bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    remetente bigint not null,
    destinatario bigint not null,
    mensagem text not null,
    msg_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



/*photosprofile/nophoto/no-photo.jpg*/

select * from  tb_users_chatapp;

select * from tb_chat_chatapp;


select * from tb_chat_chatapp where remetente = 1 and destinatario = 3 or remetente = 3 and destinatario = 1 ;

SELECT * FROM tb_chat_chatapp 
WHERE remetente IN (1, 3) 
  AND destinatario IN (1, 3) 
  AND remetente != destinatario;