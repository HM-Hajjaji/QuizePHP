<?php

namespace App\Controller\Admin;

use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class SettingController extends CoreController
{
    #[Route("/admin/setting","app_admin_setting")]
    public function index():Response
    {
        return $this->view("admin/setting/index",['isSetting' => true]);
    }
}