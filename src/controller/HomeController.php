<?php

namespace App\controller;

use App\controller\base\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view("admin/home/index",['isHome' => true]);
    }
}