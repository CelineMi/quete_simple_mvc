<?php

namespace Controller;
use Model\CategoryManager;
use Twig_Loader_Filesystem;
use Twig_Environment;

class CategoryController{

    private $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new \Twig_Environment($loader);
    }


    public function index(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAllItems();

        return $this->twig->render('Category.html.twig', ['categories' => $categories]);
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneItem($id);

        return $this->twig->render('ShowCategory.html.twig', ['category' => $category]);
    }
}