<?php

namespace App\Model;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: "category")]
class Category
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private string $title;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $createdAt;

    #[ORM\OneToMany(mappedBy: "category", targetEntity: Quiz::class)]
    private Collection $listQuiz;

    #[ORM\OneToMany(mappedBy: "category", targetEntity: Exam::class)]
    private Collection $listExam;
    public function __construct()
    {
        $this->listQuiz = new ArrayCollection();
        $this->listExam = new ArrayCollection();
        $this->setCreatedAt(new \DateTimeImmutable());
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     */
    private function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return Collection
     */
    public function getListQuiz(): Collection
    {
        return $this->listQuiz;
    }
    public function addListQuiz(Quiz $quiz): self
    {
        if (!$this->listQuiz->contains($quiz))
        {
            $this->listQuiz->add($quiz);
            $quiz->setCategory($this);
        }
        return $this;
    }
    public function removeListQuiz(Quiz $quiz): self
    {
        if (!$this->listQuiz->removeElement($quiz))
        {
            if ($quiz->getCategory() === $this)
            {
                $quiz->setCategory(null);
            }
        }
        return $this;
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
            $exam->setCategory($this);
        }
        return $this;
    }

    public function removeListExam(Exam $exam):self
    {
        if ($this->listExam->removeElement($exam))
        {
            if ($exam->getCategory() === $this)
            {
                $exam->setCategory(null);
            }
        }
        return $this;
    }

}