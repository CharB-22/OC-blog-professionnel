<?php


class FrontendController
{
    protected $postManager;
    protected $commentManager;
    protected $userManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();   
    }

    public function getHome()
    {
        $homeView = new View("Home");
        $homeView->render();
    }

    public function register()
    {
        $message = "";
        $newUser = null;

        if (isset($_POST['createUser']))
        {
            // Create user entity
            $newUser = new User(
                [
                    'name' => $_POST['name'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['userEmail'],
                    'username' => $_POST['username'],
                    'password' => password_hash($_POST['userPassword'], PASSWORD_DEFAULT),
                    'role' => 2
                ]
                );
            
            
            if ($newUser->isValid($message))
            {
                $userToCreate = $this->userManager->createUser($newUser);
                $message = "Votre compte a bien été créé. Vous pouvez maintenant laisser des commentaires.";
            }

            $registerView = new View("Register");
            $registerView->render(array("userInformation"=> $newUser, "message" => $message));

        }

        else
        {
            $registerView = new View("Register");
            $registerView->render(array("userInformation"=> $newUser, "message" => $message));
        }
        
    }

    public function connect()
    {
        $userCredentials = null;
        $message = "";

        if (isset($_POST['connect']))
        {
            
            $userCredentials = new User([
                "username" => $_POST["username"],
                "password" => $_POST["userPassword"]    
            ]);

            $userExists = $this->userManager->userExists($userCredentials);

            // Check validity password
            $checkPassword = password_verify($userCredentials->getPassword(), $userExists["password"]);

           if ($userExists === false)
           {
               $message = "Les identifiants sont incorrects";
           }
           else
           {
               if ($checkPassword)
               {
                   session_start();
                   $_SESSION['id'] = $userExists['id'];
                   $_SESSION['username'] = $userExists['username'];
                   $message = "Vous êtes connecté";
               }
               
           }

        }

            $connectView = new View("Connect");
            $connectView->render(array("userInformation"=> $userCredentials, "message" => $message));
    }

    public function getBlogList()
    {   
        $postList = $this->postManager->getBlogList();

        $blogListView = new View("BlogList");
        $blogListView->render(array("postList"=> $postList));
    }

    public function getPost()
    {
        $message = "";
        $alert = "";

        //Check the validity of the id
        if (isset ($_GET['id']) && $_GET['id'] > 0)
        {
            $id = $_GET['id'];

            if(isset($_POST['createComment']))
            {
                        //Create a new Comment entity
                $newComment = new Comment([
                    'postId' => $_GET['id'],
                    'commentContent' => $_POST["content"],
                    'commentValidation' => 0,
                    'userId' => 1 // to be dynamically determined with authentification
                ]);
                

                if ($newComment->isValid($message, $alert))
                {
                    $createdComment = $this->commentManager->createComment($newComment);
                    $message = "Merci pour votre commentaire. Il sera vérifié dans les plus brefs délais.";
                    $alert = "success";   
                }
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
            $postView->render(array("post"=>$post, "commentsList"=>$commentsList, "blogListSidebar"=>$blogListSidebar, "message" => $message, "alert" => $alert));          

        }
        else
        {
            echo 'Erreur: aucun identifiant de billet envoyé.';
        }
    }
}