<?php

abstract class AbstractController
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

    public function isAuthentificated()
    {

        // Check if user is logged in 
        if (!isset($_SESSION["roleId"]))
        {
            throw new Exception("Vous devez vous identifiez");
        }

        $role = $_SESSION["roleId"];
        return $role;
    }
}