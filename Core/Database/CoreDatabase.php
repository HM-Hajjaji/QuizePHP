<?php
namespace Core\Database;
abstract class CoreDatabase
{
    protected string $driver;
    protected string $host;
    protected string $dbname;
    protected string $username;
    protected string $password;
    protected array $options;

    public function __construct($host=null, $dbname=null, $username=null, $password=null,$driver=null,$options = []) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}