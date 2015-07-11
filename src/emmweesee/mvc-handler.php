<?php

  namespace emmweesee{
    class MvcHandler{
      private $httpContext;
      private $controllerFactoryContainer;
      
      public function __construct(IHttpContext $httpContext, IControllerFactoryContainer $controllerFactoryContainer){
        $this->httpContext = $httpContext;
        $this->controllerFactoryContainer = $controllerFactoryContainer;
      }
      
      public function handle(Route $route){
        $factory = $this->factory($route->controller());
        $controller = $factory->invoke();
        $controller->context = $this->httpContext;
        $view = call_user_func(array($controller, $route->action()), $route->parameters());
        $view->context = $this->httpContext;
        $view->compile();
        $this->header($view);
        $view->render();
      }
      
      private function factory($controller){
        $factories = $this->controllerFactoryContainer->all();
        for($index = 0, $total = count($factories); $index < $total; ++$index){
          $factory = $factories[$index];
          if($factory->support($controller)) return $factory;
        }
        throw new \Exception('Could not resolve the requested controller.');
      }
      
      private function header($view){
        $context = $this->httpContext;
        if($view->header() === View::HEADER_JSON) $context->header('content-type', 'application/json');
      }
    }
  }

?>