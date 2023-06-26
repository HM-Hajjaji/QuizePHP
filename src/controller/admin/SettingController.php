<?php

namespace App\controller\admin;

use App\controller\base\BaseController;
use App\http\Response;

class SettingController extends BaseController
{
    public function index():Response
    {
        return $this->view("admin/setting/index",['isSetting' => true]);
    }
}