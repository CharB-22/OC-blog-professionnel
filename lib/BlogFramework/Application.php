<?php
namespace BlogFramework;

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;
  
  public function __construct()
  {
    $this->httpRequest = new HTTPRequest;
    $this->httpResponse = new HTTPResponse;
    $this->name = '';
  }

  public function getController()
  {
    $router = new Router;

    $xml->load(__DIR__.'/../../App/conf/routes.xml');

    $routes = $xml->getElementsByTagName('route');

        // We go through the xml routes
        foreach ($routes as $route)
        {
          $vars = [];
    
          // Check if any variables
          if ($route->hasAttribute('vars'))
          {
            $vars = explode(',', $route->getAttribute('vars'));
          }
    
          // We add the route to the Router
          $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }
    
        try
        {
          // We get the route matching the URL
          $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        }
        catch (\RuntimeException $e)
        {
          if ($e->getCode() == Router::NO_ROUTE)
          {
            // If there is no route matching the URL we redirect to an error page
            $this->httpResponse->redirect404();
          }
        }
    
        // We had the vars to the array $_GET.
        $_GET = array_merge($_GET, $matchedRoute->vars());
    
        // On instancie le contrôleur.
        $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }
  
  abstract public function run();
  
  public function httpRequest()
  {
    return $this->httpRequest;
  }
  
  public function httpResponse()
  {
    return $this->httpResponse;
  }
  
  public function name()
  {
    return $this->name;
  }
  
}