<?php

namespace App\controller\base;

abstract class BaseController
{
    protected function view(string $path,array $data = []):void
    {
        echo str_replace("{{body}}",$this->viewContent($path,$data),$this->viewBase());;
    }

    private function viewBase():string | false
    {
        ob_start();
        include_once viewPath()."base/base.php";
        return ob_get_clean();
    }
    private function viewContent(string $path,array $data=[]):string|false
    {
        ob_start();
        foreach ($data as $key => $value)
        {
            $$key = $value;
        }
        include_once sprintf("%s/%s.php",viewPath(),$path);
        return ob_get_clean();
    }
}