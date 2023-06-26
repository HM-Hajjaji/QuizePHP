<?php

namespace App\controller\admin;

use App\controller\base\BaseController;

class SettingController extends BaseController
{
    public function index()
    {
        $this->view("admin/setting/index",['isSetting' => true]);
    }
}