<?php

namespace App\Model;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: "user")]
class User
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
    private ?array $types = null;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $createdAt;

    #[ORM\OneToMany(mappedBy: "user",targetEntity: Exam::class)]
    private Collection $listExam;

    public function __construct()
    {
        $this->listExam = new ArrayCollection();
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
     * @param array $types
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

    /**
     * @return Collection
     */
    public function getListExam(): Collection
    {
        return $this->listExam;
    }

    public function addListExam(Exam $exam): self
    {
        if (!$this->listExam->contains($exam))
        {
            $this->listExam->add($exam);
            $exam->setUser($this);
        }
        return $this;
    }

    public function removeListExam(Exam $exam)
    {
        if ($this->listExam->removeElement($exam))
        {
            if ($exam->getUser() === $this)
            {
                $exam->setUser(null);
            }
        }
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