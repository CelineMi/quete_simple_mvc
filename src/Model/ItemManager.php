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
        $statement = $this->pdo->prepare('INSERT INTO' . self::TABLE . "('title') VALUES (':title')");
        $statement->bindvalue(':title', $item->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()){
            return $this->pdo->lastInsertId();
        }
    }

    public function add()
    {
        if(!empty($_POST))
        {
            $item = new Item();
            $item->setTitle($_POST['title']);

            $itemManager = new ItemManager();
            $itemManager->insert($item);

            header('Location: /');
            exit();
        }
        return $this->twig->render('item/add.html.twig');
    }

}


?>