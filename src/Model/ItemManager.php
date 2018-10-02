<?php
// src/Model/ItemManager.php
namespace Model;

require __DIR__ . '/../../app/db.php';

// récupération de tous les items

class ItemManager{
    public function selectAllItems() :array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM item";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }
}


?>