<?php

require "C:\MAMP\htdocs\blog-professionnel\App\Model\Database.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\PostManager.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\CommentManager.php";

class FrontendController
{
    protected $postManager;
    protected $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();    
    }

    public function getHome()
    {
        require "App\View\Home.php";
    }

    public function getBlogList()
    {
        
        $blogList = $this->postManager->getBlogList();
        require "App\View\BlogList.php";
    }

    public function getPost($id)
    {
        $data = $this->postManager->getPost($id);
        $blogList = $this->postManager->getBlogList();

        $comment = $this->commentManager->getCommentsPost($_GET['id']);

        require "App\View\Article.php";

    }
}