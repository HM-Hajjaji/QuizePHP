<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $this->view("admin/user/index",['isUser' => true]);
    }
}