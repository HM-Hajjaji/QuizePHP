<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class UserController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true]);
    }
}