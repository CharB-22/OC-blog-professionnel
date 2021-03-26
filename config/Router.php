<?php
    require "App\Controller\FrontendController.php";

    class Router
    {

        protected $frontendController;

        public function __construct()
        {
            $this->frontendController = new FrontendController();
        }

        public function run()
        {
            try
            {                   
                if (isset($_GET['route']))
                {
                    if($_GET['route'] === 'home')
                    {
                        $this->frontendController->home();
                    }

                    if($_GET['route'] === 'bloglist')
                    {
                        $this->frontendController->blogList();                        
                    }

                    if($_GET['route'] === 'post')
                    {
                        if(isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->frontendController->post($_GET['id']); 
                        }
                        else
                        {
                            echo 'Erreur: aucun identifiant de billet envoyé.';
                        }
                    }

                    else 
                    {
                        echo "Page Inconnue";
                    }
                }
                else 
                {
                    $this->frontendController->home();
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }