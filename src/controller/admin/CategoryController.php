<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class CategoryController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true]);
    }
}