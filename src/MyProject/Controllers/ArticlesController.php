<?php


namespace MyProject\Controllers;


use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesName = [];

        foreach ($properties as $property){
            $propertiesName[] = $property->getName();
        }
        
        var_dump($propertiesName);
        return;

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $articleAuthor = User::getById($article->getAuthorId());

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'author' => $articleAuthor
        ]);
    }
}