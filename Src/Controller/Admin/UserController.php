<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class UserController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/user/index",['isUser' => true]);
    }
}