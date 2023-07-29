<?php

namespace App\Controller\Security;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class SecurityController extends CoreController
{
    #[Route("/login","app_login",['GET','POST'])]
    public function login():Response
    {
        return $this->view("security/login");
    }

    #[Route("/register","app_register",['GET','POST'])]
    public function register():Response
    {
        return $this->view("security/register");
    }
}