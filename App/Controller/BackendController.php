<?php

class BackendController
{
    protected $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function getAdminHome()
    {
        $adminHomeView = new View("AdminHome");
        $adminHomeView->render();
    }

    public function getAdminPostList()
    {
        $adminPostList = $this->postManager->getBlogList();

        $adminPostListView = new View("AdminPostList");
        $adminPostListView->render(array("postList" => $adminPostList));
    }
}