<?php

namespace App\Controller\Admin;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class ExamController extends CoreController
{
    #[Route("/admin/exam","app_admin_exam")]
    public function index():Response
    {
        return $this->view("admin/exam/index",['isExam' => true]);
    }
}