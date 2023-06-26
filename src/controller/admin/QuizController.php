<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class QuizController extends BaseController
{
    public function index()
    {
        $this->view("admin/quiz/index",['isQuiz' => true]);
    }
}