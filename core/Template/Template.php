<?php

namespace Core\Template;

class Template
{
    private ?string $pathExtends = null;
    private array $data = [];

    public function extends(string $path):void
    {
        $this->pathExtends = $path;
    }

    public function assign(string $variableName, mixed $value):void
    {
        $this->data[$variableName] = $value;
    }

    public function render(?array $params):string|false
    {
        extract($this->data);
        extract($params);
        ob_start();
        include sprintf(viewPath()."%s.php",$this->pathExtends);
        return ob_get_clean();
    }
}