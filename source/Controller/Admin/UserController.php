<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Core\Controller\CoreController;
use Core\Http\Response;

class UserController extends CoreController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true,"users" => $this->userRepository->findAll()]);
    }
}