<?php

namespace App\Controller\Admin;

use Core\Component\Controller\CoreController;

use Http\Response;
use Route\Route;

class HomeController extends CoreController
{
    #[Route("/admin","app_admin_home")]
    public function index():Response
    {
        return $this->view("admin/home/index",['isHome' => true]);
    }
}