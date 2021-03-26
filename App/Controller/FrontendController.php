<?php

require "C:\MAMP\htdocs\blog-professionnel\App\Model\Database.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\PostManager.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\CommentManager.php";

class FrontendController
{
    public function home()
    {
        require "App\View\Home.php";
    }

    public function blogList()
    {
        $postManager = new PostManager();
        $blogList = $postManager->getBlogList();

        require "App\View\BlogList.php";
    }

    public function post($id)
    {
        $post = new PostManager();
        $data = $post->getPost($id);

        require "App\View\Article.php";
    }
}