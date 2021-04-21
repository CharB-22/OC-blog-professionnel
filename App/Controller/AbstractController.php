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

        $roleId = $_SESSION["roleId"];
        // Check if user is logged in 
        if (isset($roleId))
        {
            return $roleId;
        }
        else
        {
            throw new Exception("Vous devez vous identifiez");
        }
    }

    public function checkAdminRights()
    {
        $role = $this->isAuthentificated();

        if($role != User::ROLE_ADMIN)
        {
            throw new Exception ("Vous n'avez pas les droits suffisants.");
        }
    }

}