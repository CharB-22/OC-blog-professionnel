<?php

class Database
{

  protected $db;

  const DB_HOST = 'mysql:host=localhost;dbname=projet5_database';
  const DB_USER = 'root';
  const DB_PASSWORD = 'root';

  private function checkConnection()
  {
    if($this->db === null)
    {
      return $this->dbConnect();
    }

    else
    {
      return $this->db;
    }
  }

  public function dbConnect()
  {
    try
    {
      $db = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $db;
    }
    
    catch (Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
  }

  public function createQuery($sql, $parameters)
  {
    if ($parameters)
    {
      $response = $this->checkConnection()->prepare($sql);
      $response->execute($parameters);

      return $response;
    }
    else
    {
      $response = $this->checkConnection()->query($sql);
      return $response;
    }
  }
}