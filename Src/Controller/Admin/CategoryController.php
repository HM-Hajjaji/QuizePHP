<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class CategoryController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true]);
    }
}