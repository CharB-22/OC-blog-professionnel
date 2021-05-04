<?php

abstract class AbstractManager
{

  protected $projectDB;

  private function checkConnection()
  {
    if($this->projectDB === null)
    {
      return $this->dbConnect();
    }

    else
    {
      return $this->projectDB;
    }
  }

  public function dbConnect()
  {
    try
    {
      $projectDB = new PDO("mysql:host=" . DB_HOST. ";dbname=". DB_NAME , DB_USER, DB_PASSWORD);
      $projectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $projectDB;
    }
    
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function createQuery($sql, $parameters = null)
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