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
        $statement = $this->pdo->prepare('INSERT INTO' . self::TABLE . "('name') VALUES (':name')");
        $statement->bindvalue(':name', $category->getName(), \PDO::PARAM_STR);
        if ($statement->execute()){
            return $this->pdo->lastInsertId();
        }
    }

    public function add()
    {
        if(!empty($_POST))
        {
            $category = new Category();
            $category->setName($_POST['name']);

            $categoryManager = new CategoryManager();
            $categoryManager->insert($category);

            header('Location: /category');
            exit();
        }
        return $this->twig->render('category/add.html.twig');
    }
}