<?php

namespace Core\Controller;

use Core\Http\Response;

abstract class CoreController
{
    protected function view(string $view,array $data = []):Response
    {
        $response = route()->getResponse();
        return $response($this->renderView($view,$data));
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

    public function redirectTo(string $path):void
    {
        route()->getRequest()->setMethod("GET");
        header("location:".path($path));
        exit();
    }
}