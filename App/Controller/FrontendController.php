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

    public function getPost()
    {
        //Check the validity of the id
        if (isset ($_GET['id']) && $_GET['id'] > 0)
        {
            $id = $_GET['id'];

            if(isset($_POST['createComment']))
            {
                $createdComment = $this->commentManager->createComment($id);
                
                // Get the data for the main content
                $post = $this->postManager->getPost($id);
                $commentsList = $this->commentManager->getCommentsPost($id);

                // Get the data for the sidebar
                $blogListSidebar = $this->postManager->getBlogListSidebar();
            }

            // Display the Post content
            // Get the data for the main content
            $post = $this->postManager->getPost($id);
            $commentsList = $this->commentManager->getCommentsPost($id);

            // Get the data for the sidebar
            $blogListSidebar = $this->postManager->getBlogListSidebar();

            //Send all data to the matching view :
            $postView =  new View ("Post");
            $postView->render(array("post"=>$post, "commentsList"=>$commentsList, "blogListSidebar"=>$blogListSidebar));          

        }
        else
        {
            echo 'Erreur: aucun identifiant de billet envoyé.';
        }
    }
}