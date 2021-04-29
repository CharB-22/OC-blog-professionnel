<?php

spl_autoload_register(function ($class_name) {
    if (file_exists("config/" . $class_name . ".php"))
    {
        require_once "config/" . $class_name . ".php";
    }

    else if (file_exists("App/Model/" . $class_name . ".php"))
    {
        require_once "App/Model/" . $class_name . ".php";
    }

    else if (file_exists("App/Controller/" . $class_name . ".php"))
    {
        require_once "App/Controller/" . $class_name . ".php";
    }

    else if (file_exists("App/View/" . $class_name . ".php"))
    {
        require_once "App/View/" . $class_name . ".php";
    }
    else if (file_exists("vendor/phpmailer/phpmailer/src/" . $class_name . ".php"))
    {
        require_once "vendor/phpmailer/phpmailer/src/" . $class_name . ".php";
    }
});