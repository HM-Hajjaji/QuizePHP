<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class HomeController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/home/index",['isHome' => true]);
    }
}