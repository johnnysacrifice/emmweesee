<?php

  namespace emmweesee{
    class Router implements IRouter{
      private $httpContext;
      private $baseRoute;

      public function __construct(IHttpContext $httpContext, Route $baseRoute){
        $this->httpContext = $httpContext;
        $this->baseRoute = $baseRoute;
      }
      
      public function resolve(){
        $context = $this->httpContext;
        $requestPath = $context->requestPath();
        $parts = explode('/', $requestPath);
        if(count($parts) === 1 && $parts[0] === '') return $this->none();
        if(count($parts) === 2 && $parts[1] === '') return $this->partial($parts[0]);
        list($controller, $action) = array(array_shift($parts), array_shift($parts));
        return new Route($controller, $action, $parts);
      }
      
      private function none(){
        $route = $this->baseRoute;
        return new Route($route->controller(), $route->action(), $route->parameters());
      }
      
      private function partial($controller){
        $route = $this->baseRoute;
        return new Route($controller, $route->action(), $route->parameters());
      }
    }
  }

?>