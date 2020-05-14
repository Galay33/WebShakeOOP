<?php


namespace MyProject\Controllers;


use MyProject\Exceptions\NotFoundException;
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

    public function view (int $articleId): void
    {
        $article = Article::getById($articleId);


        if ($article === null) {
            throw new NotFoundException();
        }

        $articleAuthor = User::getById($article->getAuthorId());

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'author' => $articleAuthor
        ]);
    }

    public function edit (int $articleId): void
    {
        $article = Article::getById($articleId);



        if ($article === null) {
            throw new NotFoundException();
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();
    }

    public function add () : void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи, которая будет добавлена, если все правильно.');

        $article->save();

    }

    public function delete (int $id)
    {
        $article = Article::getById($id);
        if ($article !== null){
            $article->delete();
            echo "Статья удалена";
            var_dump($article);
        }
        else   echo "Такой статьи не существует!";
    }

}