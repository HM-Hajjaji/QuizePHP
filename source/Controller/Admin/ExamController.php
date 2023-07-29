<?php

namespace App\Controller\Admin;

use App\Repository\ExamRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use JetBrains\PhpStorm\NoReturn;
use Route\Route;

#[Route("/admin/exam")]
class ExamController extends CoreController
{
    private ExamRepository $examRepository;

    public function __construct()
    {
        $this->examRepository = new ExamRepository();
    }

    #[Route("/","app_admin_exam")]
    public function index():Response
    {
        return $this->view("admin/exam/index",['isExam' => true,"exams" => $this->examRepository->findAll()]);
    }

    #[Route("/{id}/show","app_admin_exam_show")]
    public function show(int $id): Response
    {
        return $this->view("admin/exam/show",['exam' => $this->examRepository->find($id)]);
    }

    #[NoReturn]
    #[Route("/{id}/delete","app_admin_exam_delete",'POST')]
    public function delete(int $id): void
    {
        $this->examRepository->remove($this->examRepository->find($id));
        $this->redirectTo("app_admin_exam");
    }
}