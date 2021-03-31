<?php

require "App\Model\View.php";
require "App\Model\Manager.php";
require "App\Model\PostManager.php";
require "App\Model\CommentManager.php";

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
        $homeView = new View("Home");
        $homeView->generateContent(array("title"=> "Mon blog professionnel"));
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
        $commentsList = $this->commentManager->getCommentsPost($_GET['id']);

        // To get the data for the sidebar
        $blogListSidebar = $this->postManager->getBlogListSidebar();

        require "App\View\PostView.php";

    }
}