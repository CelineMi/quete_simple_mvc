<?php
namespace Model;

// récupération de tous les items

class ItemManager extends AbstractManager
{
    const TABLE = 'item';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert(Item $item)
    {
        $query = "INSERT INTO " . self::TABLE . " (title) VALUES (:title)";
        $statement = $this->pdo->prepare($query);
        $statement->bindvalue(':title', $item->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()){
            return $this->pdo->lastInsertId();
        }
    }

    public function update(Item $item)
    {
        $query = "UPDATE " . self::TABLE . " SET title=:title WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindvalue(':id', $item->getId() ,\PDO::PARAM_STR);
        $statement->bindvalue(':title', $item->getTitle(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(int $id){
        $query = "DELETE FROM " . self::TABLE . " WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindvalue(':id', $id, \PDO::PARAM_STR);
        $statement->execute();
    }

}

