<?php
namespace models;

use PDO;

class Model
{
    public $pdo;

    public function __construct()
    {
        $dbOptions = [
            'host' => 'mysql',
            'dbname' => 'developmentdb',
            'user' => 'developer',
            'password' => "secret123"
        ];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->pdo->exec('SET NAMES UTF8');
    }
}