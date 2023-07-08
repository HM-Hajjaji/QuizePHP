<?php

namespace Core\Util;

interface HashInterface
{
    public function hash(string $password,$algo = PASSWORD_BCRYPT):string;
    public static function verify(string $password,string $hash):bool;
}