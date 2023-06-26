<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class ExamController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/exam/index",['isExam' => true]);
    }
}