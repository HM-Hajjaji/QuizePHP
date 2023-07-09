<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Core\Controller\CoreController;
use Core\Http\Response;
use Core\Http\Route;

class UserController extends CoreController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    #[Route("app_admin_user","/admin/user")]
    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true,"users" => $this->userRepository->findAll()]);
    }
}