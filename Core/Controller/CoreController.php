<?php

namespace Core\Controller;

use Core\Http\Response;
use JetBrains\PhpStorm\NoReturn;

abstract class CoreController
{
    protected function view(string $view,array $data = []):Response
    {
        return route()->getResponse()->setContent($this->renderView($view,$data))->send();
    }

    private function renderView(string $path, array $data): string
    {
        extract($data);
        ob_start();
            include_once sprintf(viewPath()."%s.php",$path);
        $body = ob_get_clean();
        template()->assign("body",$body);
        return template()->render($data);
    }

    #[NoReturn] public function redirectTo(string $path, array $params=[]):void
    {
        route()->getRequest()->setMethod("GET");
        header("location:".path($path,$params));
        exit();
    }
}