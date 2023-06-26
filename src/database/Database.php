<?php

namespace App\database;

use PDO;

class Database
{
    private $driver;
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $options;

    public function __construct($host=null, $dbname=null, $username=null, $password=null,$driver=null,$options = []) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
        $this->driver = $driver;
    }


    public function getDSN() {
        return "$this->driver:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getOptions() {
        return $this->options;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public static function handler():self
    {
        return new self('localhost', env("DB_NAME"), env("DB_USER","root"), env("DB_PASSWORD",""), env("DB_DRIVER","mysql"),[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }

    public function connect():PDO | bool
    {
        try {
            $pdo = new PDO(self::handler()->getDSN(),self::handler()->getUsername(),self::handler()->getPassword(),self::handler()->getOptions());
            return $pdo;
        }catch (\PDOException $e)
        {
            dd($e->getMessage());
        }
        return false;
    }
}