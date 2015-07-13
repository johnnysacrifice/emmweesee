<?php

  namespace emmweesee{
    class MvcApplication{
      private $context;
      private $router;
      private $container;
      private $renderer;
      private $handler;

      public function __construct(
        IHttpContext $context, IRouter $router, IControllerFactoryContainer $container, IViewRenderer $renderer
      ){
        $this->context = $context;
        $this->router = $router;
        $this->container = $container;
        $this->renderer = $renderer;
        $this->instantiate();
      }
      
      private function instantiate(){
        $this->handler = new MvcHandler($this->context, $this->container, $this->renderer);
      }
      
      public static function create(Route $route, IControllerFactoryContainer $container){
        $context = new HttpContext(new HttpServer());
        $router = new Router($context, $route);
        $renderer = new InlineViewRenderer();
        return new self($context, $router, $container, $renderer);
      }
      
      public function execute(){
        $handler = $this->handler;
        $router = $this->router;
        $handler->handle($router->resolve());
      }
      
      public function redirect($to){
        $context = $this->context;
        $context->redirect(sprintf('%s%s', $context->baseUrl(), $to));
      }
    }
  }

?>