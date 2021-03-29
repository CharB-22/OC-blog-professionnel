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
                        $this->frontendController->getHome();
                    }

                    if($_GET['route'] === 'bloglist')
                    {
                        $this->frontendController->getBlogList();                        
                    }

                    if($_GET['route'] === 'post')
                    {
                        if(isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->frontendController->getPost($_GET['id']); 
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
                    $this->frontendController->getHome();
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }