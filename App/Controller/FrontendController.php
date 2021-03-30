<?php

require "C:\MAMP\htdocs\blog-professionnel\App\Model\Manager.php";
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
        $postList = $this->postManager->getBlogList();
        require "App\View\BlogList.php";
    }

    public function getPost($id)
    {
        // To get the data for the main content
        $post = $this->postManager->getPost($id);
        $comment = $this->commentManager->getCommentsPost($_GET['id']);

        // To get the data for the sidebar
        $blogList = $this->postManager->getBlogList();

        require "App\View\Article.php";

    }
}