<?php
use App\Controller\Admin\CategoryController;
use App\Controller\Admin\ExamController;
use App\Controller\Admin\HomeController;
use App\Controller\Admin\QuizController;
use App\Controller\Admin\SettingController;
use App\Controller\Admin\UserController;

//admin
core()->getRoute()->get("app_admin_home","/admin",[HomeController::class,"index"]);
    //category
core()->getRoute()->get("app_admin_category","/admin/category",[CategoryController::class,"index"]);
core()->getRoute()->get("app_admin_category_new","/admin/category/new",[CategoryController::class,"new"]);
core()->getRoute()->post("app_admin_category_new","/admin/category/new",[CategoryController::class,"new"]);

core()->getRoute()->get("app_admin_quiz","/admin/quiz",[QuizController::class,"index"]);
core()->getRoute()->get("app_admin_exam","/admin/exam",[ExamController::class,"index"]);
core()->getRoute()->get("app_admin_setting","/admin/setting",[SettingController::class,"index"]);
core()->getRoute()->get("app_admin_user","/admin/user",[UserController::class,"index"]);