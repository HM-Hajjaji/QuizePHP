<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Core\Controller\CoreController;
use Core\Http\Response;

class UserController extends CoreController
{
    private static UserRepository $userRepository;

    public function __construct()
    {
        self::$userRepository = new UserRepository();
    }


    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true,"users" => self::$userRepository->all()]);
    }
}