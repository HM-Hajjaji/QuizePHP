<?php

namespace App\Model;
use App\Repository\QuizRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: QuizRepository::class)]
#[ORM\Table(name: "quiz")]
class Quiz
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private string $question;

    #[ORM\Column(type: 'string')]
    private string $answer;

    #[ORM\Column(type: 'string')]
    private string $warning_first;

    #[ORM\Column(type: 'string')]
    private string $warning_second;

    #[ORM\Column(type: 'float')]
    private float $note;

    #[ORM\ManyToOne(targetEntity: Category::class,inversedBy: "listQuiz")]
    #[ORM\JoinColumn(name: "category_id",referencedColumnName: "id")]
    private Category $category;

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
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return string
     */
    public function getWarningFirst(): string
    {
        return $this->warning_first;
    }

    /**
     * @param string $warning_first
     */
    public function setWarningFirst(string $warning_first): void
    {
        $this->warning_first = $warning_first;
    }

    /**
     * @return string
     */
    public function getWarningSecond(): string
    {
        return $this->warning_second;
    }

    /**
     * @param string $warning_second
     */
    public function setWarningSecond(string $warning_second): void
    {
        $this->warning_second = $warning_second;
    }

    /**
     * @return float
     */
    public function getNote(): float
    {
        return $this->note;
    }

    /**
     * @param float $note
     */
    public function setNote(float $note): void
    {
        $this->note = $note;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

}