<?php
require_once "config/_config.php";
require_once "config/autoload.php";

session_start();

$Application = new Router();

$Application->run();