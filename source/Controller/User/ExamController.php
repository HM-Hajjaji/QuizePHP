<?php

namespace App\Controller\User;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

#[Route("/user/exam")]
class ExamController extends CoreController
{
    #[Route("/","app_user_exam")]
    public function index():Response
    {
        return $this->view("user/exam/index",['isExam' => true]);
    }
}