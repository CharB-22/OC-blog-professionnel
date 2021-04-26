<?php

class UrlRequest
{
  protected $get;
  protected $post;
  protected $session;

  public function __construct()
  {
    $this->get = new Parameter($_GET);
    $this->post = new Parameter($_POST);
    $this->session = $_SESSION;
  }

  public function getGet()
  {
    return $this->get;
  }

  public function getPost()
  {
    return $this->post;
  }

  public function getSession()
  {
    return $this->session;
  }
}