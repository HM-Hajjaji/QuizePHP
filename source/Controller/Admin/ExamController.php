<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;
use Core\Http\Route;

class ExamController extends CoreController
{
    #[Route("app_admin_exam","/admin/exam")]
    public function index():Response
    {
        return $this->view("admin/exam/index",['isExam' => true]);
    }
}