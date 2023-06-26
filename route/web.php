<?php

use App\controller\CategoryController;
use App\controller\HomeController;
use App\http\Route;

Route::get("app_home","/",[HomeController::class,"index"]);
Route::get("app_category","/category",[CategoryController::class,"index"]);
