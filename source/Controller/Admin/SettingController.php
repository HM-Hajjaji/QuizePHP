<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;
use Core\Http\Route;

class SettingController extends CoreController
{
    #[Route("app_admin_setting","/admin/setting")]
    public function index():Response
    {
        return $this->view("admin/setting/index",['isSetting' => true]);
    }
}