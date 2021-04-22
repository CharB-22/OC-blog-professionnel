<?php

class BackendController extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAdminHome()
    {
        $adminRights = parent::checkAdminRights();

        $adminHomeView = new View("AdminHome");
        $adminHomeView->render();
 
    }

    public function getAdminPostList()
    {
        $adminRights = parent::checkAdminRights();


        $message = "";
        $adminPostList = $this->postManager->getBlogList();

        $adminPostListView = new View("AdminPostList");
        $adminPostListView->render(array("postList" => $adminPostList, "message"=>$message));

    }

    public function getAdminCreatePost()
    {
        $adminRights = parent::checkAdminRights();

        $newPost = null;
        $message = "";
        
        if (isset($_POST['createPost']))
        {   
        // Create a Post object with the information from the form
            $newPost = new Post([
                'title'=> $_POST['title'],
                'excerpt' => $_POST['excerpt'],
                'content' => $_POST['content'],
                'authorId' => $_SESSION['id']
            ]);
        
            if ($newPost->isValid($message))
            {
                $postToCreate = $this->postManager->createPost($newPost);
                $message = new UserMessage ("Le post a bien été créé", "success");

                $adminPostList = $this->postManager->getBlogList();
                $adminPostListView = new View("AdminPostList");
                $adminPostListView->render(array("postList" => $adminPostList, "message" => $message));
            }

            else
            {
        
                $adminNewPostView = new View("AdminCreatePost");
                $adminNewPostView->render(array("newPost" => $newPost, "message" => $message));
            }

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
        $adminRights = parent::checkAdminRights();

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
                $message = new UserMessage("Mise à jour réussie.", "success");
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
        $adminRights = parent::checkAdminRights();

        if (isset($_POST['deletePost']) && isset($_GET['id']))
        {
            $this->commentManager->deletePostComments($_GET['id']);
            $this->postManager->deletePost($_GET['id']);
                    
            $message = new UserMessage("Le post a été supprimé","danger");
        
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
        $adminRights = parent::checkAdminRights();

        $message = "";

        if (isset($_POST['approveComment']))
        {
            $commentApproved = new Comment([
                'commentId' => $_GET['commentId'],
                'commentValidation' => 1
                ]);
        
            $this->commentManager->approveComment($commentApproved);
            $message = new UserMessage("Le commentaire a été approuvé.", "success");
        }
        else if(isset($_POST['deleteComment']))
        {
            $this->commentManager->deleteComment($_GET['commentId']);
            $message = new UserMessage("Le commentaire a été supprimé.", "danger");
        }
        
        $commentsToManage = $this->commentManager->getCommentsToManage();
        $adminCommentListView = new View("AdminCommentList");
        $adminCommentListView->render(array("commentsToManage"=> $commentsToManage, "message" => $message));
    }

    public function getAdminUserList()
    {
        $adminRights = parent::checkAdminRights();
        $message = "";

        if (isset($_POST['updateRole']))
        {
            $userToUpdate = new User([
                'userId' => $_GET['userId'],
                'roleId' => 1
                ]);
        
            $this->userManager->updateStatus($userToUpdate);
            $message = new UserMessage("Le changement de statut est actif.", "success");
        }
        else if(isset($_POST['deleteUser']))
        {
            $this->userManager->deleteUser($_GET['userId']);
            $message = new UserMessage("L'utilisateur a bien été supprimé.", "danger");
        }
        
        $userList = $this->userManager->getUserList();
        $userListView = new View("AdminUserList");
        $userListView->render(array("userList" => $userList, "message" => $message));
    }
}