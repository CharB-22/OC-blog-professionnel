<?php

    class Router
    {

        protected $frontendController;
        protected $backendController;

        public function __construct()
        {
            $this->frontendController = new FrontendController();
            $this->backendController = new BackendController();
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
                    case 'adminHome':
                        $this->backendController->getAdminHome();
                        break;
                    case 'adminPostList':
                        $this->backendController->getAdminPostList();
                        break;
                    case 'adminCommentList':
                        $this->backendController->getCommentsToApprove();
                        break;
                    default:
                        $this->frontendController->getHome();
                        break;
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }