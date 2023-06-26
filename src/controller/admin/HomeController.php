<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class HomeController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/home/index",['isHome' => true]);
    }
}