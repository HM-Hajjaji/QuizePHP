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
        $viewBaseContent = $this->renderViewContent(viewPath() . "base/base.php", $data);
        return str_replace("{{body}}",$this->renderViewContent(viewPath() . $path . ".php", $data),$viewBaseContent);
    }

    private function renderViewContent(string $viewPath, array $data): string
    {
        extract($data);
        ob_start();
            include_once $viewPath;
        return ob_get_clean();
    }

    #[NoReturn] public function redirectTo(string $path, array $params=[]):void
    {
        route()->getRequest()->setMethod("GET");
        header("location:".path($path,$params));
        exit();
    }
}