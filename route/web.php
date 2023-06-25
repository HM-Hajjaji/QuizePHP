<?php

use App\controller\HomeController;
use App\http\Route;

Route::get("/",function (){
    echo "hello word?";
});

Route::get("/home",[HomeController::class,"index"]);