<?php

require "C:\MAMP\htdocs\blog-professionnel\App\Model\Database.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\PostManager.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\CommentManager.php";

class FrontendController
{
    protected $PostManager;
    protected $CommentManager;

    public function __construct()
    {
        $this->PostManager = new PostManager();
        $this->CommentManager = new CommentManager();    
    }

    public function home()
    {
        require "App\View\Home.php";
    }

    public function blogList()
    {
        
        $blogList = $this->PostManager->getBlogList();
        require "App\View\BlogList.php";
    }

    public function post($id)
    {
        $data = $this->PostManager->getPost($id);
        $blogList = $this->PostManager->getBlogList();

        $comment = $this->CommentManager->getCommentsPost($_GET['id']);

        require "App\View\Article.php";

    }
}