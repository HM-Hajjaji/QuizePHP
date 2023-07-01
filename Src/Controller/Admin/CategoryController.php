<?php

namespace App\Controller\Admin;

use App\model\Category;
use App\Repository\CategoryRepository;
use Core\Controller\CoreController;
use Core\Http\Request;
use Core\Http\Response;

class CategoryController extends CoreController
{
    private CategoryRepository $categoryRepository;
    private Request $request;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->request = core()->getRoute()->getRequest();
    }

    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true,"categorys" => $this->categoryRepository->all()]);
    }

    public function new():Response
    {
        if ($this->request->getMethod() == "post")
        {
            $category = new Category();
            $category->setTitle($this->request->get()['title']);
            $this->categoryRepository->add($category);
            $this->redirectTo("app_admin_category");
        }
        return $this->view("admin/category/new",['isCategory' => true]);
    }

    public function delete()
    {

    }
}