<?php

namespace App\Controller\User;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class SettingController extends CoreController
{
    #[Route("/user/setting","app_user_setting")]
    public function index():Response
    {
        return $this->view("user/setting/index",['isSetting' => true]);
    }
}