<?php


class FrontendController extends AbstractController
{

    public function __construct()
    {
        parent::__construct(); 
    }

    public function getHome()
    {
        $message = "";
            if (isset($_POST["submitEmail"]))
            {
              // corps du message
              $sendTo = EMAIL_TO;
              $subject  = $_POST["emailSubject"];
              $emailContent = "
                <html>
                    <body>
                    <p>Vous avez reçu un message de ". $_POST["senderName"] . " "
                    . $_POST["senderLastName"] ."</p>
                    <p>Contenu du message:<p>".
                    $_POST["emailContent"]."
                    </body>
                </html>
                ";
              $headers  = 'From: charlene-openclassrooms@outlook.fr '. "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8' . "\r\n" .
            'Reply-To:'. $_POST["senderEmail"] ;

              if(mail($sendTo, $subject, $emailContent, $headers)){
                 $message = new UserMessage("Message envoyé.","success");
              }else{
                $message = new UserMessage("L'envoi du message a échoué.", "danger");
              }
             
            }
        $homeView = new View("Home");
        $homeView->render(array("message" => $message));
    }

    public function register()
    {

        $message = "";
        $newUser = null;
    
        if (isset($_POST['createUser']))
        {
            if(isset($_SESSION["id"]))
            {
                throw new Exception("Vous êtes déjà identifié.");
            }
            // Create user entity
            $newUser = new User(
                [
                    'name' => $_POST['name'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['userEmail'],
                    'username' => $_POST['username'],
                    'password' => password_hash($_POST['userPassword'], PASSWORD_DEFAULT),
                    'role' => User::ROLE_VISITOR
                ]
                );

            if ($newUser->isValid($message))
            {
                // Make sure the username is unique
                $isUsernameAvailable = $this->userManager->userExists($newUser);

                if ($isUsernameAvailable !== null)
                {
                    $message = new UserMessage("Ce nom d'utilisateur existe déja.", "danger");

                    $registerView = new View("Register");
                    $registerView->render(array("userInformation"=> $newUser, "message" => $message));
                }
                else
                {
                    $this->userManager->createUser($newUser);
                    $message = new UserMessage("Votre compte a bien été créé. Vous pouvez maintenant vous connecter.", "success");
                                    
                    // Redirect customer to the connexion page to start session
                    $connectView = new View("Connect");
                    $connectView->render(array("message" => $message));
                }
            }
            else
            {
                $registerView = new View("Register");
                $registerView->render(array("userInformation"=> $newUser, "message" => $message));
            }
        }
        
        else
        {
            $registerView = new View("Register");
            $registerView->render(array("userInformation"=> $newUser, "message" => $message));
        }
    }

    public function connect()
    {
        $message = "";

        if (isset($_POST['connect']))
        {
            if(isset($_SESSION["id"]))
            {
                throw new Exception("Vous êtes déjà identifié.");
            }

            if(isset($_POST["username"]) && isset($_POST["userPassword"]))
            {
                $userCredentials = new User([
                    "username" => $_POST["username"],
                    "password" => $_POST["userPassword"]    
                ]);
            }
            else
            {
                $message = new UserMessage("Veuillez renseigner un nom d'utlisateur et un mot de passe.");
            }

 
            $userExists = $this->userManager->userExists($userCredentials);

           if ($userExists === false)
           {
               $message = new UserMessage("Cet utilisateur n'existe pas.", "danger");
                
                $connectView = new View("Connect");
                $connectView->render(array("message" => $message));
           }
           else
           {
                // Check validity password
                $checkPassword = password_verify($userCredentials->getPassword(), $userExists["password"]);

                if ($checkPassword === true)
               {
                   session_start();
                   $_SESSION['id'] = $userExists['userId'];
                   $_SESSION['name'] = $userExists['name'];
                   $_SESSION['lastName'] = $userExists['lastName'];
                   $_SESSION['username'] = $userExists['username'];
                   $_SESSION['roleId'] = $userExists['roleId'];

                    // Redirect to the homepage
                    $homeView = new View("Home");
                    $homeView->render();

               }
               else
               {
                   $message = new UserMessage("Le mot de passe est incorrect.", "danger");
                   $connectView = new View("Connect");
                   $connectView->render(array("message" => $message));
               }
               
           }
        }
        else
        {
            $connectView = new View("Connect");
            $connectView->render(array("message" => $message));
        }
    }

    public function disconnect()
    {

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
    
        // Page de confirmation de la déconnexion
        $disconnectView = new View("Disconnect");
        $disconnectView->render();
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

        //Check the validity of the id
        if (!isset ($_GET['id']))
        {
            throw new Exception("Le post correspondant n'existe pas.");
        }

        $id = $_GET['id'];

        if(isset($_POST['createComment']))
            {
                if(isset($_SESSION['id']))
                {
                    //Create a new Comment entity
                    $newComment = new Comment([
                        'postId' => $_GET['id'],
                        'commentContent' => $_POST["content"],
                        'commentValidation' => 0,
                        'userId' => $_SESSION['id'] // to be dynamically determined with authentification
                        ]);

                if ($newComment->isValid($message))
                {
                    $this->commentManager->createComment($newComment);
                    $message = new UserMessage ("Merci pour votre commentaire. Il sera vérifié dans les plus brefs délais.","success");   
                }

            }
            else
            {
                $message = new UserMessage ("Vous devez être connecté pour laisser un commentaire.","danger");
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
            $postView->render(array("post"=>$post, "commentsList"=>$commentsList, "blogListSidebar"=>$blogListSidebar, "message" => $message));
    }

    public function getLegal()
    {
        $legalView = new View("Legal");
        $legalView->render();
    }
}