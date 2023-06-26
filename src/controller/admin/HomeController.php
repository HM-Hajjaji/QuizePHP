<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view("admin/home/index",['isHome' => true]);
    }
}