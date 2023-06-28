<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class QuizController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/quiz/index",['isQuiz' => true]);
    }
}