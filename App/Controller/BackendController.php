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
        }

            // Display the form to create a Post
            $adminCreatePostView = new View("AdminCreatePost");
            $adminCreatePostView->render();

    }

    public function getAdminUpdatePost()
    {
        
        // Manage the new data sent with the form
        if (isset($_POST['updatePost']) && isset($_GET['id']))
        {
            $postToUpdate= $this->postManager->updatePost($_GET['id']);

        }

        // Just display the elements
        $postToUpdate = $this->postManager->getPost($_GET['id']);

        $adminCreatePostView = new View("AdminUpdatePost");
        $adminCreatePostView->render(array("postToUpdate" => $postToUpdate));

    }

    public function getAdminDeletePost()
    {
        
        if (isset($_POST['deletePost']) && isset($_GET['id']))
        {
            $this->postManager->deletePost($_GET['id']);
            $this->getAdminPostList();
        }
        else
        {
            // Get the data from the post
            $postToDelete = $this->postManager->getPost($_GET['id']);

            // Send the post data to the view
            $adminCreatePostView = new View("AdminDeletePost");
            $adminCreatePostView->render(array("postToDelete" => $postToDelete));
        }

    }

    public function getCommentsToManage()
    {

        if (isset($_POST['approveComment']))
        {
            $this->commentManager->approveComment($_GET['commentId']);
        }
        else if(isset($_POST['deleteComment']))
        {
            $this->commentManager->deleteComment($_GET['commentId']);
        }

        $commentsToManage = $this->commentManager->getCommentsToManage();
        $adminCommentListView = new View("AdminCommentList");
        $adminCommentListView->render(array("commentsToManage"=> $commentsToManage)); 

    }

}