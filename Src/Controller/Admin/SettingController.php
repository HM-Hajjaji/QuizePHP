<?php

namespace App\Controller\Admin;

use Core\Controller\CoreController;
use Core\Http\Response;

class SettingController extends CoreController
{
    public function index():Response
    {
        return $this->view("admin/setting/index",['isSetting' => true]);
    }
}