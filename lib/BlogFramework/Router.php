<?php

namespace BlogFramework;

class Router
{
    protected $routes = [];

    const NO_ROUTES = 1;

    public function addRoute(Route $route)
    {
        if (!in_array($route, $this->routes))
        {
            $this->routes[] = $route;
        }
    }

    public function getRoute($url)
    {
        foreach($this->routes as $route)
        {
            // if the url are matching
            if (($varsValues = $route->match($url)) !== false)
            {
                //if the route has variables
                if ($route->hasVars())
                {
                  $varsNames = $route->varsNames();
                  $listVars = [];

                  foreach ($varValues as $key=>$match)
                  {
                    if ($key !== 0)
                    {
                      $listVars[$varsNames[$key - 1]] = $match;
                    }
                  }
                  // We get the new var array
                  $route->setVars($listVars);
                }
                
                return $route;
            }
        }

        // or the url are not matching
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
}
