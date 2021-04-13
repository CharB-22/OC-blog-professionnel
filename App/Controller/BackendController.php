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
        $message = "";
        $adminPostList = $this->postManager->getBlogList();

        $adminPostListView = new View("AdminPostList");
        $adminPostListView->render(array("postList" => $adminPostList, "message"=>$message));
    
    }

    public function getAdminCreatePost()
    {
        $newPost = null;
        $message = "";

        if (isset($_POST['createPost']))
        {   
            // Create a Post object with the information from the form
            $newPost = new Post([
                'title'=> $_POST['title'],
                'excerpt' => $_POST['excerpt'],
                'content' => $_POST['content']
            ]);

            if ($newPost->isValid($message))
            {
                $postToCreate = $this->postManager->createPost($newPost);
                $message = "Le post a bien été créé";
            }

            $adminNewPostView = new View("AdminCreatePost");
            $adminNewPostView->render(array("newPost" => $newPost, "message" => $message));
        }

        else
        {
            // Display the form to create a Post
            $adminCreatePostView = new View("AdminCreatePost");
            $adminCreatePostView->render(array("newPost" => $newPost, "message" => $message));
        }

    }

    public function getAdminUpdatePost()
    {
        $message = "";
        // Manage the new data sent with the form
        if (isset($_POST['updatePost']) && isset($_GET['id']))
        {
            $postUpdated = new Post([
                'id' => $_GET['id'],
                'title'=> $_POST['title'],
                'excerpt' => $_POST['excerpt'],
                'content' => $_POST['content']
            ]);

            if ($postUpdated->isValid($message))
            {
                $postToUpdate= $this->postManager->updatePost($postUpdated);
                $message = "Mise à jour réussie.";
            }

            $adminUpdatePostView = new View("AdminUpdatePost");
            $adminUpdatePostView->render(array("postToUpdate" => $postUpdated, "message" => $message));
        }
        else
        {
            // Just display the elements
            $postToUpdate = $this->postManager->getPost($_GET['id']);

            $adminCreatePostView = new View("AdminUpdatePost");
            $adminCreatePostView->render(array("postToUpdate" => $postToUpdate, "message" => $message));

        }
    }

    public function getAdminDeletePost()
    {
        
        if (isset($_POST['deletePost']) && isset($_GET['id']))
        {
            $this->postManager->deletePost($_GET['id']);
            
            $message = "Le post a été supprimé";

            $adminPostList = $this->postManager->getBlogList();

            $adminPostListView = new View("AdminPostList");
            $adminPostListView->render(array("postList" => $adminPostList, "message" => $message));
        }
        else if (isset($_POST['cancelDelete']) && isset($_GET['id']))
        {
            $this->getAdminPostList();
        }
        else
        {
            // Display the post to delete details.
            $postToDelete = $this->postManager->getPost($_GET['id']);

            $adminDeletePostView = new View("AdminDeletePost");
            $adminDeletePostView->render(array("postToDelete" => $postToDelete));
        }

    }

    public function getCommentsToManage()
    {

        $message = "";
        if (isset($_POST['approveComment']))
        {
            $commentApproved = new Comment([
                'commentId' => $_GET['commentId'],
                'commentValidation' => 1
            ]);

            $this->commentManager->approveComment($commentApproved);
            $message = "Le commentaire a été approuvé.";
        }
        else if(isset($_POST['deleteComment']))
        {
            $this->commentManager->deleteComment($_GET['commentId']);
            $message = "Le commentaire a été supprimé.";
        }

        $commentsToManage = $this->commentManager->getCommentsToManage();
        $adminCommentListView = new View("AdminCommentList");
        $adminCommentListView->render(array("commentsToManage"=> $commentsToManage, "message" => $message)); 

    }

}