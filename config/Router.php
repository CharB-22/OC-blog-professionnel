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
            $request = new UrlRequest(array_merge($_GET, $_POST));

            try
            {   
                if ($request->existsParameter("route"))
                {
                    $route = $request->getParameter("route");
                    switch($route)
                    {
                        case 'home':
                            $this->frontendController->getHome();
                            break;
                        case 'bloglist':
                            $this->frontendController->getBlogList();
                            break;
                        case 'post':
                            $this->frontendController->getPost();
                            break;
                        case 'adminHome':
                            $this->backendController->getAdminHome();
                            break;
                        case 'adminPostList':
                            $this->backendController->getAdminPostList();
                            break;
                        case 'adminCommentList':
                            $this->backendController->getCommentsToManage();
                            break;
                        case 'adminCreatePost':
                            $this->backendController->getAdminCreatePost();
                            break;
                        case 'adminUpdatePost':
                            $this->backendController->getAdminUpdatePost();
                            break;
                        case 'adminDeletePost':
                            $this->backendController->getAdminDeletePost();
                            break;
                        case 'adminUserList':
                            $this->backendController->getAdminUserList();
                            break;
                        case 'register':
                            $this->frontendController->register();
                            break;
                        case 'connect':
                            $this->frontendController->connect();
                            break;
                        case 'disconnect':
                            $this->frontendController->disconnect();
                            break;
                        default:
                            throw new Exception("Cette page n'existe pas.");
                            break;
                    }
                }
                else
                {
                    $this->frontendController->getHome();
                }

            }
            catch(Exception $e)
            {
                $ErrorView = new View("Error");
                $ErrorView->render(array("errorMessage"=> $e));
            }
        }
    }