<?php

namespace App\Database;

use Core\Database\CoreDatabase;
use PDO;

class MySql extends CoreDatabase
{
    protected string $driver = "mysql";
    private ?PDO $PDO = null;
    public function __construct($host=null, $dbname=null, $username=null, $password=null,$options = []) {
        parent::__construct($host,$dbname,$username,$password,$this->driver,$options);
        $this->connect();
    }

    public function getDSN():string {
        return "$this->driver:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
    }

    private function connect():PDO | bool
    {
        try {
            $this->PDO = new PDO($this->getDSN(),$this->getUsername(),$this->getPassword(),$this->getOptions());
            return $this->PDO;
        }catch (\PDOException $e)
        {
            dd($e->getMessage());
        }
        return false;
    }

    /**
     * the function get object of pdo
     * @return PDO|null
     */
    public function getPDO(): ?PDO
    {
        return $this->PDO;
    }

}