<?php
// src/Controller/ItemController.php
namespace Controller;

use Model\ItemManager;
//require __DIR__ . '/../Model/ItemManager.php';

class ItemController{

    public function index(){
        $itemManager = new ItemManager();
        $items = $itemManager->selectAllItems();

        require __DIR__ . '/../View/item.php';
    }

}


?>