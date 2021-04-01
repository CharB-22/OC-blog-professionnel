<?php
    require "App\Controller\FrontendController.php";

    class Router
    {
        public function run()
        {
            try
            {                   
                if (isset($_GET['route']))
                {
                    if($_GET['route'] === 'home')
                    {
                        $frontendController = new FrontendController();
                        $frontendController->home();
                    }

                    if($_GET['route'] === 'bloglist')
                    {
                        $frontendController = new FrontendController();
                        $frontendController->blogList();                        
                    }

                    if($_GET['route'] === 'post')
                    {
                        if(isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $frontendController = new FrontendController();
                            $frontendController->post($_GET['id']); 
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
                    $frontendController = new FrontendController();
                    $frontendController->home();
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }