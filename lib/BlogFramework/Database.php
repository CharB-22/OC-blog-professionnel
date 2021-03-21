<?php
namespace BlogFramework;

class Database
{
  public static function dbConnect()
  {
    $db = new \PDO('mysql:host=localhost;dbname=news', 'root', '');
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    return $db;
  }
}