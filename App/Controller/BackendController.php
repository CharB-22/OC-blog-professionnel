<?php

class BackendController
{
    protected $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }


}