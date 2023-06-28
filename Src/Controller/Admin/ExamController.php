<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class ExamController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/exam/index",['isExam' => true]);
    }
}