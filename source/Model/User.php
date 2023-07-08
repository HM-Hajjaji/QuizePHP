<?php

namespace App\Model;

use Core\Util\HashInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "user")]
class User implements HashInterface
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $username;

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'json',nullable: true)]
    private array $types;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
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