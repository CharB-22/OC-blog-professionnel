<?php

abstract class AbstractManager
{

  protected $projectDB;

  const DB_HOST = 'mysql:host=localhost;dbname=oc-projet5';
  const DB_USER = 'root';
  const DB_PASSWORD = 'root';

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
      $projectDB = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
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