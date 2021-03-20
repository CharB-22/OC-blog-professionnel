<?php
namespace BlogFramework;

class HttpResponse extends ApplicationComponent
{
    protected $page;

    public function addHeader($header)
    {
        header($header);
    }

    public function redirect($location)
    {
        header('Location '.$location);
    }



    public function redirect404()
    {
        // will add code later
    }

    public function send()
    {
        exit($this->page->getGeneratedPage());
    }

    public function setCookie($name, $value='', $expire= 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {

    }

    public function setPage(Page $page) 
    {
        $this->page = $page;
    }
}