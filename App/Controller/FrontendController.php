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
        //Check the validity of the id

        if(isset($id) && $id > 0)
        {
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