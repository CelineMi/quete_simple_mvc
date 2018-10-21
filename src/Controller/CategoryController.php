<?php

namespace Controller;
use Model\CategoryManager;
use Model\Category;


class CategoryController extends AbstractController {

    protected $twig;

    public function index(){
        $categoryManager = new CategoryManager($this->pdo);
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Category.html.twig', ['categories' => $categories]);
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        return $this->twig->render('ShowCategory.html.twig', ['category' => $category]);
    }
    
    public function add(){
        $categoryManager = new CategoryManager($this->pdo);
        $category = new Category();
        $category->setName($_POST['name']);
        if ($category->isValid()){
            $categoryManager->insert($category);
        }
       header('Location: /category');
    }

    public function edit(int $id){
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        return $this->twig->render('editCategory.html.twig', ['category' => $category]);
    }

    public function update(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = new Category();
        $category->setId($id);
        $category->setName($_POST['name']);
        $categoryManager->update($category);
        header('Location: /category');
    }

    public function delete(int $id){
        $categoryManager = new CategoryManager($this->pdo);
        $categoryManager->delete($id);
        header('Location: /category');
    }
}