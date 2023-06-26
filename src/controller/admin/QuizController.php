<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class QuizController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/quiz/index",['isQuiz' => true]);
    }
}