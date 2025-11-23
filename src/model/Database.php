<?php

namespace App\model;

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

class Database
{


    /**
     * Método para carregar as variáveis de configurção do banco de dados
     */
    public static function loadEnv()
    {

        $path = dirname(__DIR__.'/../../../'); // Caminho para a raiz do projeto
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();
    }
   

    public static function getConnnection()
    {
        self::loadEnv();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_DATABASE'];
        $port = $_ENV['DB_PORT'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];


        try{
            $pdo = new \PDO("mysql:host=".$host."; dbname=".$dbname."; port=".$port, $user, $pass);
            return $pdo;
        }catch(\PDOException $err){
            die("ERRO_DB: ".$err->getMessage());
        }
    }
}