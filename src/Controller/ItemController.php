<?php

namespace Controller;

use Model\ItemManager;
use Model\Item;

class ItemController extends AbstractController
{

    public function index(){
        $itemManager = new ItemManager($this->pdo);
        $items = $itemManager->selectAll();
        return $this->twig->render('Item.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('ShowItem.html.twig', ['item' => $item]);
    }

    public function add(){
        $itemManager = new ItemManager($this->pdo);
        $item = new Item();
        $item->setTitle($_POST['title']);
        if ($item->isValid()){
            $itemManager->insert($item);
        }
        header('location: /');
    }

    public function edit(int $id){
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('edit.html.twig', ['item' => $item]);
    }

    public function update(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $item = new Item();
        $item->setId($id);
        $item->setTitle($_POST['title']);
        $itemManager->update($item);
        header('Location: /');
    }

    public function delete(int $id){
        $itemManager = new ItemManager($this->pdo);
        $itemManager->delete($id);
        header('Location: /');
    }


}




