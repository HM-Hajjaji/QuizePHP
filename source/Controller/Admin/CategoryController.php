<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Repository\CategoryRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use JetBrains\PhpStorm\NoReturn;
use Route\Route;

#[Route("/admin/category")]
class CategoryController extends CoreController
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    #[Route("/","app_admin_category")]
    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true,"categorys" => $this->categoryRepository->findAll()]);
    }

    #[Route("/new","app_admin_category_new",["GET","POST"])]
    public function new():Response
    {
        if (request()->server->getMethod() == "POST")
        {
            $data = request()->query->all();

            validator()->setData($data)
                ->required(array_keys($data))
                ->min("title",3)
            ;

            if (validator()->isValid())
            {
                $category = new Category();
                $cleanData = validator()->getCleanData();
                $category->setTitle($cleanData['title']);
                $this->categoryRepository->save($category);
                $this->redirectTo("app_admin_category");
            }else{
                return $this->view("admin/category/new",['isCategory' => true,'errors' => validator()->getErrors(),'old' => $data]);
            }
        }
        return $this->view("admin/category/new",['isCategory' => true]);
    }

    #[Route("/{id}/edit","app_admin_category_edit",["GET","POST"])]
    public function edit(int $id):Response
    {
        $category = $this->categoryRepository->find($id);
        if (request()->server->getMethod() == "POST")
        {
            $data = request()->query->all();

            validator()->setData($data)
                ->required(array_keys($data))
                ->min("title",3)
            ;
            if (validator()->isValid())
            {
                $cleanData = validator()->getCleanData();
                $category->setTitle($cleanData['title']);
                $this->categoryRepository->save($category);
                $this->redirectTo("app_admin_category_show",['id' => $category->getId()]);
            }else{
                return $this->view("admin/category/edit",["category" => $category,'errors' => validator()->getErrors(),'old' => $data,'isCategory' => true]);
            }
        }
        return $this->view("admin/category/edit",["category" => $category,'isCategory' => true]);
    }

    #[Route("/{id}/show","app_admin_category_show")]
    public function show(int $id):Response
    {
        return $this->view("admin/category/show",['category' => $this->categoryRepository->find($id),'isCategory' => true]);
    }

    #[Route("/{id}/delete","app_admin_category_delete","POST")]
    #[NoReturn]
    public function delete(int $id):void
    {
        $this->categoryRepository->remove($this->categoryRepository->find($id));
        $this->redirectTo("app_admin_category");
    }
}