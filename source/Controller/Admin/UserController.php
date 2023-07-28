<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class UserController extends CoreController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    #[Route("/admin/user","app_admin_user")]
    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true,"users" => $this->userRepository->findAll()]);
    }
}