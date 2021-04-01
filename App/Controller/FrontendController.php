<?php

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
        $homeView->render();
    }

    public function getBlogList()
    {   
        $postList = $this->postManager->getBlogList();

        $blogListView = new View("BlogList");
        $blogListView->render(array("postList"=> $postList));
    }

    public function getPost($id)
    {
        // To get the data for the main content
        $post = $this->postManager->getPost($id);
        $commentsList = $this->commentManager->getCommentsPost($_GET['id']);

        // To get the data for the sidebar
        $blogListSidebar = $this->postManager->getBlogListSidebar();

        $postView =  new View ("Post");
        $postView->render(array("post"=>$post, "commentsList"=>$commentsList, "blogListSidebar"=>$blogListSidebar));

    }
}