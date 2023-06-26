<?php

use App\controller\admin\CategoryController;
use App\controller\admin\ExamController;
use App\controller\admin\HomeController;
use App\controller\admin\QuizController;
use App\controller\admin\SettingController;
use App\controller\admin\UserController;
use App\http\Route;

//admin
Route::get("app_admin_home","/admin",[HomeController::class,"index"]);
Route::get("app_admin_category","/admin/category",[CategoryController::class,"index"]);
Route::get("app_admin_quiz","/admin/quiz",[QuizController::class,"index"]);
Route::get("app_admin_exam","/admin/exam",[ExamController::class,"index"]);
Route::get("app_admin_setting","/admin/setting",[SettingController::class,"index"]);
Route::get("app_admin_user","/admin/user",[UserController::class,"index"]);