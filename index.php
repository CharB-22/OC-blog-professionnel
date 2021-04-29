<?php

require_once "config/autoload.php";
require_once "vendor/autoload.php";

session_start();

$Application = new Router();

$Application->run();