<?php

namespace App\Controller\User;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class HomeController extends CoreController
{
    #[Route("/","app_user_home")]
    public function index(): Response
    {
        return $this->view("user/home/index",['isHome' => true]);
    }
}