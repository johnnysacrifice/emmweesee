<?php

  namespace emmweesee{
    class MvcHandler{
      private $httpContext;
      private $controllerFactoryContainer;
      private $viewRenderer;
      
      public function __construct
        (IHttpContext $httpContext, IControllerFactoryContainer $controllerFactoryContainer, IViewRenderer $viewRenderer){
        $this->httpContext = $httpContext;
        $this->controllerFactoryContainer = $controllerFactoryContainer;
        $this->viewRenderer = $viewRenderer;
      }
      
      public function handle(Route $route){
        $factory = $this->factory($route->controller());
        $controller = $factory->invoke();
        $controller->context = $this->httpContext;
        $view = call_user_func_array(array($controller, $this->action($route->action())), $route->parameters());
        $view->context = $this->httpContext;
        $this->header($view);
        $this->render($view);
      }
      
      private function factory($controller){
        $factories = $this->controllerFactoryContainer->all();
        for($index = 0, $total = count($factories); $index < $total; ++$index){
          $factory = $factories[$index];
          if($factory->support($controller)) return $factory;
        }
        throw new \Exception('Could not resolve the requested controller.');
      }
      
      private function action($action){
        $invoke = '';
        $total = strlen($action);
        $prev = '';
        for($index = 0; $index < $total; ++$index){
          $character = $action[$index];
          $fix = ($character === '-' && $prev != '-') ? true : false;
          if(!$fix) $invoke .= ($prev === '-') ? strtoupper($character) : $character;
          $prev = $character;
        }
        return $invoke;
      }
      
      private function header($view){
        $context = $this->httpContext;
        if($view->header() === View::HEADER_JSON) $context->header('content-type', 'application/json');
      }
      
      private function render($view){
        $renderer = $this->viewRenderer;
        $renderer->render($view);
      }
    }
  }

?>