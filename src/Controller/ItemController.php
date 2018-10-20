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
}




