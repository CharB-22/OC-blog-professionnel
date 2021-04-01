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
                $route = $_GET['route'];
                
                switch($route)
                {
                    case 'home':
                        $this->frontendController->getHome();
                        break;
                    case 'bloglist':
                        $this->frontendController->getBlogList();
                        break;
                    case 'post':
                        $this->frontendController->getPost($_GET['id']);
                        break;
                    default:
                        echo "Page Inconnue";
                        break;
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }