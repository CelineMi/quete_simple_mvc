<?php
namespace Model;
use App\Connection;

class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert(Category $category)
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE . " (name) VALUES (:name)");
        $statement->bindvalue('name', $category->getName(), \PDO::PARAM_STR);
        if ($statement->execute()){
            return $this->pdo->lastInsertId();
        }
    }

    public function update(Category $category)
    {
        $query = "UPDATE " . self::TABLE . " SET name=:name WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindvalue(':id', $category->getId() ,\PDO::PARAM_STR);
        $statement->bindvalue(':name', $category->getName(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(int $id){
        $query = "DELETE FROM " . self::TABLE . " WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindvalue(':id', $id, \PDO::PARAM_STR);
        $statement->execute();
    }


}