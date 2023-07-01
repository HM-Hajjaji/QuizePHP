<?php
use App\Controller\Admin\CategoryController;
use App\Controller\Admin\ExamController;
use App\Controller\Admin\HomeController;
use App\Controller\Admin\QuizController;
use App\Controller\Admin\SettingController;
use App\Controller\Admin\UserController;

//admin
core()->getRoute()->get("app_admin_home","/admin",[HomeController::class,"index"]);
core()->getRoute()->get("app_admin_hamza","/{id}/hamza",function ($id){
    echo "hamza : $id";
});
    //category
route()->get("app_admin_category","/admin/category",[CategoryController::class,"index"]);
route()->get("app_admin_category_new","/admin/category/new",[CategoryController::class,"new"]);
route()->post("app_admin_category_new","/admin/category/new",[CategoryController::class,"new"]);
route()->post("app_admin_category_delete","/admin/category/{id}/delete/{name}",[CategoryController::class,"delete"]);
    //quiz
route()->get("app_admin_quiz","/admin/quiz",[QuizController::class,"index"]);
    //exam
route()->get("app_admin_exam","/admin/exam",[ExamController::class,"index"]);
    //setting
route()->get("app_admin_setting","/admin/setting",[SettingController::class,"index"]);
    //user
route()->get("app_admin_user","/admin/user",[UserController::class,"index"]);