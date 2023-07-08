<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Repository\CategoryRepository;
use Core\Controller\CoreController;
use Core\Http\Response;
use JetBrains\PhpStorm\NoReturn;

class CategoryController extends CoreController
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->categoryRepository = new CategoryRepository();
    }

    public function index():Response
    {
        return $this->view("admin/category/index",['isCategory' => true,"categorys" => $this->categoryRepository->findAll()]);
    }

    public function new():Response
    {
        if ($this->request->getMethod() == "POST")
        {
            $data = $this->request->request->all();

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

    public function edit(int $id):Response
    {
        $category = $this->categoryRepository->find($id);
        if ($this->request->getMethod() == "POST")
        {
            $data = $this->request->request->all();

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