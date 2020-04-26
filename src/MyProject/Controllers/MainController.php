<?php


namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;
use MyProject\Services\Db;
class MainController
{
    private $view;

    private $db;

    public function __construct()
    {
        $this ->view = new View(__DIR__ . '/../../../templates');
        $this->db = Db::getInstance();
    }
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

}