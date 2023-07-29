<?php

namespace App\Controller\User;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

#[Route("/user/category")]
class CategoryController extends CoreController
{
    #[Route("/","app_user_category")]
    public function index(): Response
    {
        return $this->view("user/category/index",["isCategory" => true]);
    }
}