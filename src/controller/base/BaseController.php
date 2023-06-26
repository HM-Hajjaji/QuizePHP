<?php

namespace App\controller\base;

abstract class BaseController
{
    protected function view(string $path, array $data = []): void
    {
        echo $this->renderView($path, $data);
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
        include $viewPath;
        return ob_get_clean();
    }
}