<?php

namespace App\Controller\Admin;

use App\Repository\QuizRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

#[Route("/admin/quiz")]
class QuizController extends CoreController
{
    private QuizRepository $quizRepository;

    public function __construct()
    {
        $this->quizRepository = new QuizRepository();
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

        }
        return $this->view("admin/quiz/new",['isQuiz' => true]);
    }
}