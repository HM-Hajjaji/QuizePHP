<?php
use App\Controller\Admin\CategoryController;
use App\Controller\Admin\ExamController;
use App\Controller\Admin\HomeController;
use App\Controller\Admin\QuizController;
use App\Controller\Admin\SettingController;
use App\Controller\Admin\UserController;

//admin
route()->get("app_admin_home","/admin",[HomeController::class,"index"]);

    //category
route()->get("app_admin_category","/admin/category",[CategoryController::class,"index"]);
route()->match("app_admin_category_new","/admin/category/new",[CategoryController::class,"new"]);
route()->match("app_admin_category_edit","/admin/category/{id}/edit",[CategoryController::class,"edit"]);
route()->get("app_admin_category_show","/admin/category/{id}/show",[CategoryController::class,"show"]);
route()->post("app_admin_category_delete","/admin/category/{id}/delete",[CategoryController::class,"delete"]);

    //quiz
route()->get("app_admin_quiz","/admin/quiz",[QuizController::class,"index"]);
    //exam
route()->get("app_admin_exam","/admin/exam",[ExamController::class,"index"]);
    //setting
route()->get("app_admin_setting","/admin/setting",[SettingController::class,"index"]);
    //user
route()->get("app_admin_user","/admin/user",[UserController::class,"index"]);