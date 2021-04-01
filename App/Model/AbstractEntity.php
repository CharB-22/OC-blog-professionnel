<?php

abstract class AbstractEntity
{
    public function hydrate(array $postData)
    {
        foreach ($postData as $key => $value)
        {
          $method = 'set'.ucfirst($key);
              
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }    
    }
}