<?php

namespace App;


use Core\Component\Trigger\Kernel;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Core extends Kernel
{
    public function run(string $projectDir): void
    {
        (new Run())->pushHandler(new PrettyPageHandler())->register();
        $this->initialize($projectDir);
    }
}