<?php

namespace App\Model;

use Core\Util\HashInterface;

class User implements HashInterface
{
    private int $id;
    private string $name;
    private string $username;
    private string $password;
    private array $types;
    private \DateTimeImmutable $createdAt;

    /**
     * @param string $name
     * @param string $username
     * @param string $password
     * @param array $types
     */
    public function __construct(int $id = null,string $name, string $username, string $password, array $types,\DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->types = $types;
        $this->createdAt = $createdAt;
    }

    public function __toString(): string
    {
        return ucfirst($this->name);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name =ucfirst($name);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        $types = $this->types;
        $types[] = 'TYPE_USER';
        return array_unique($types);
    }

    /**
     * @param array $type
     */
    public function setType(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function hash(string $password, $algo = PASSWORD_BCRYPT): string
    {
        return password_hash($password,$algo);
    }

    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password,$hash);
    }
}