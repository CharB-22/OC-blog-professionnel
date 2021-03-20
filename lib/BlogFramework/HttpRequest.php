<?php
namespace BlogFramework;

class HttpRequest extends ApplicationComponent
{
    public function cookieExists($info)
    {
        return isset($_COOKIE[$info]);
    }

    public function cookieData($info)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function getExists($info)
    {
        return isset($_GET[$info]);
    }

    public function getData($info)
    {
        return isset($_GET[$info]) ? $_GET[$info] : null;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function postExists($info)
    {
        return isset($_POST[$info]);
    }

    public function postData($info)
    {
        return isset($_POST[$info]) ? $_POST[$info] : null;
    }

    public function requestedURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
}