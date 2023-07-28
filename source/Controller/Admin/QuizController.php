<?php

namespace App\Controller\Admin;

use App\Model\Quiz;
use App\Repository\CategoryRepository;
use App\Repository\QuizRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use JetBrains\PhpStorm\NoReturn;
use Route\Route;

#[Route("/admin/quiz")]
class QuizController extends CoreController
{
    private QuizRepository $quizRepository;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->quizRepository = new QuizRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    #[Route("/","app_admin_quiz")]
    public function index():Response
    {

        return $this->view("admin/quiz/index",['isQuiz' => true,"quizs" => $this->quizRepository->findAll()]);
    }

    #[Route("/new","app_admin_quiz_new",['GET','POST'])]
    public function new():Response
    {
        if (request()->server->getMethod() == "POST")
        {
            $data = request()->query->all();
            validator()->setData($data)
                ->required(request()->query->keys())
                ->numeric("note");

            if (validator()->isValid())
            {
                $quiz = new Quiz();
                $cleanData = validator()->getCleanData();
                $quiz->setQuestion($cleanData['question']);
                $quiz->setAnswer($cleanData['answer']);
                $quiz->setWarningFirst($cleanData['warning_first']);
                $quiz->setWarningSecond($cleanData['warning_second']);
                $quiz->setNote($cleanData['note']);
                $quiz->setCategory($this->categoryRepository->find($cleanData['category']));
                $this->quizRepository->save($quiz);
                $this->redirectTo("app_admin_quiz");
            }else{
                return $this->view("admin/quiz/new",['isQuiz' => true,"categorys" => $this->categoryRepository->findAll(), 'errors' => validator()->getErrors(),'old' => $data]);
            }
        }
        return $this->view("admin/quiz/new",['isQuiz' => true,"categorys" => $this->categoryRepository->findAll()]);
    }

    #[Route("/{id}/edit","app_admin_quiz_edit",['GET','POST'])]
    public function edit(int $id):Response
    {
        $quiz = $this->quizRepository->find($id);

        if (request()->server->getMethod() == "POST")
        {
            $data = request()->query->all();
            validator()->setData($data)
                ->required(request()->query->keys())
                ->numeric("note");

            if (validator()->isValid())
            {
                $cleanData = validator()->getCleanData();
                $quiz->setQuestion($cleanData['question']);
                $quiz->setAnswer($cleanData['answer']);
                $quiz->setWarningFirst($cleanData['warning_first']);
                $quiz->setWarningSecond($cleanData['warning_second']);
                $quiz->setNote($cleanData['note']);
                $quiz->setCategory($this->categoryRepository->find($cleanData['category']));
                $this->quizRepository->save($quiz);
                $this->redirectTo("app_admin_quiz_show",['id' => $quiz->getId()]);
            }else{
                return $this->view("admin/quiz/edit",['isQuiz' => true, "quiz" => $quiz, "categorys" => $this->categoryRepository->findAll(), 'errors' => validator()->getErrors(),'old' => $data]);
            }
        }
        return $this->view("admin/quiz/edit",['isQuiz' => true,"quiz" => $quiz,"categorys" => $this->categoryRepository->findAll()]);
    }

    #[Route("/{id}/show","app_admin_quiz_show")]
    public function show(int $id):Response
    {
        return $this->view("admin/quiz/show",['isQuiz' => true,"quiz" => $this->quizRepository->find($id)]);
    }

    #[NoReturn]
    #[Route("/{id}/delete","app_admin_quiz_delete","POST")]
    public function delete(int $id):void
    {
        $this->quizRepository->remove($this->quizRepository->find($id));
        $this->redirectTo("app_admin_quiz");
    }
}