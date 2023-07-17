<?php

namespace Core\Console\Service\Source\Support;

trait View
{
    public function generateViewContent(): string
    {
        return<<<'VIEW'
        <?=inheritance("base-admin")?>
        
        <?=block("title")?><?=$controller?><?=endBlock("title")?>
        
        <?=block("body")?>
        Welcome <?=$controller?>
        <?=endBlock("body")?>
        VIEW;
    }
}