<?php

use App\controller\CategoryController;
use App\controller\HomeController;
use App\http\Route;

Route::get("/",[HomeController::class,"index"]);
Route::get("/category",[CategoryController::class,"index"]);

