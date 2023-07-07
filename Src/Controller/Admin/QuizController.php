<?php

namespace App\Controller\Admin;

use App\Repository\QuizRepository;
use Core\Controller\CoreController;
use Core\Http\Response;

class QuizController extends CoreController
{
    private QuizRepository $quizRepository;

    public function __construct()
    {
        parent::__construct();
        $this->quizRepository = new QuizRepository();
    }

    public function index():Response
    {
        return $this->view("admin/quiz/index",['isQuiz' => true]);
    }
}