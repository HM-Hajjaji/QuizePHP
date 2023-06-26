<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        $this->view("admin/category/index",['isCategory' => true]);
    }
}