<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Repository\CategoryRepository;
use Core\Controller\CoreController;
use Core\Http\Request;
use Core\Http\Response;
use JetBrains\PhpStorm\NoReturn;

class CategoryController extends CoreController
{
    private Request $request;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->request = core()->getRoute()->getRequest();
        $this->categoryRepository = new CategoryRepository();
    }

    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true,"categorys" => $this->categoryRepository->findAll()]);
    }

    public function new():Response
    {
        if ($this->request->getMethod() == "post")
        {
            $category = new Category();
            $category->setTitle($this->request->get()['title']);
            $this->categoryRepository->save($category);
            $this->redirectTo("app_admin_category");
        }
        return $this->view("admin/category/new",['isCategory' => true]);
    }

    public function edit(int $id):Response
    {
        $category = $this->categoryRepository->find($id);
        if ($this->request->getMethod() == "post")
        {
            $category->setTitle($this->request->get("title"));
            $this->categoryRepository->save($category);
            $this->redirectTo("app_admin_category_show",['id' => $category->getId()]);
        }
        return $this->view("admin/category/edit",["category" => $category,'isCategory' => true]);
    }

    public function show(int $id):Response
    {
        return $this->view("admin/category/show",['category' => $this->categoryRepository->find($id),'isCategory' => true]);
    }
    #[NoReturn] public function delete(int $id):void
    {
        $this->categoryRepository->remove($this->categoryRepository->find($id));
        $this->redirectTo("app_admin_category");
    }
}