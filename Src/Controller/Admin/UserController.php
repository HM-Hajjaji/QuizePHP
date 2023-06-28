<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Core\Controller\CoreController;
use Core\Http\Response;

class UserController extends CoreController
{
    public function index():Response
    {
        $userRepository = new UserRepository();
        return $this->view("admin/user/index",['isUser' => true,"users" => $userRepository->all()]);
    }
}