<?php

namespace Core\Console\Command;

use JetBrains\PhpStorm\NoReturn;

interface CommandInterface
{
    #[NoReturn]
    public function execute():void;

}