<?php

class BackendController
{
    protected $postManager;
    protected $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function getAdminHome()
    {
        // Insert here authentification control
        $adminHomeView = new View("AdminHome");
        $adminHomeView->render();
    }

    public function getAdminPostList()
    {
        // Insert here authentification control
        $adminPostList = $this->postManager->getBlogList();

        $adminPostListView = new View("AdminPostList");
        $adminPostListView->render(array("postList" => $adminPostList));
    }

    public function getAdminCreatePost()
    {
        if (isset($_POST['createPost']))
        {
            
            $postCreated = $this->postManager->createPost();

            $adminCreatePostView = new View("AdminCreatePost");
            $adminCreatePostView->render(array("message" => $postCreated));

        }
        else
        {
            $adminCreatePostView = new View("AdminCreatePost");
            $adminCreatePostView->render();
        }

    }

    public function getCommentsToApprove()
    {
        $commentsToApprove = $this->commentManager->getCommentsToApprove();

        $adminCommentListView = new View("AdminCommentList");
        $adminCommentListView->render(array("commentsToApprove"=> $commentsToApprove)); 
    }

}