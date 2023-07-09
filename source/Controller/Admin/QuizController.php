<?php

namespace App\Controller\Admin;

use App\Repository\QuizRepository;
use Core\Controller\CoreController;
use Core\Http\Response;
use Core\Http\Route;

class QuizController extends CoreController
{
    private QuizRepository $quizRepository;

    public function __construct()
    {
        $this->quizRepository = new QuizRepository();
    }

    #[Route("app_admin_quiz","/admin/quiz")]
    public function index():Response
    {
        return $this->view("admin/quiz/index",['isQuiz' => true]);
    }
}