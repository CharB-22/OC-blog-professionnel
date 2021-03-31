<?php

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
                        require "C:\MAMP\htdocs\blog-professionnel\App\View\Home.php";
                    }

                    if($_GET['route'] === 'bloglist')
                    {
                        require "C:\MAMP\htdocs\blog-professionnel\App\View\BlogList.php";
                    }

                    if($_GET['route'] === 'post')
                    {
                        if(isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            require "C:\MAMP\htdocs\blog-professionnel\App\View\Article.php";
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
                    require "C:\MAMP\htdocs\blog-professionnel\App\View\Home.php";
                }
            }
            catch(Exception $e)
            {
                die('Erreur:' . $e->getMessage());
            }
        }
    }