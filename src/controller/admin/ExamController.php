<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class ExamController extends BaseController
{
    public function index()
    {
        $this->view("admin/exam/index",['isExam' => true]);
    }
}