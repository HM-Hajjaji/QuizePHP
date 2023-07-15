<?php

namespace Core\Compiler;

class Compiler
{
    public static function compile(string $content):string
    {
        preg_match("/@inheritance\((.+)\)@/",$content,$parentalBlocks);
        $contentInheritance = self::getContentInheritance(end($parentalBlocks));

        return preg_replace_callback("/@block\((\w+)\)@/",function ($block) use($content){
            preg_match("/@block\($block[1]\)@([^.]+)@endBlock\($block[1]\)@/",$content,$mt);
            return $mt[1];
        },$contentInheritance);
    }

    private static function getContentInheritance(string $file): bool|string
    {
        ob_start();
        require_once sprintf("%s%s.php",viewPath(),$file);
        return ob_get_clean();
    }
}