<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;
use Core\Http\Route;

class HomeController extends CoreController
{
    #[Route("app_admin_home","/admin")]
    public function index():Response
    {
        return $this->view("admin/home/index",['isHome' => true]);
    }
}