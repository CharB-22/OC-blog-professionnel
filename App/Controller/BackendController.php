<?php

class BackendController
{
    protected $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function getAdminHome()
    {
        $adminHomeView = new View("AdminHome");
        $adminHomeView->render();
    }
}