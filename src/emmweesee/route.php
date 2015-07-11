<?php

  namespace emmweesee{
    class Route{
      private $controller;
      private $action;
      private $parameters;
      
      public function __construct($controller, $action, Array $parameters){
        $this->controller = $controller;
        $this->action = $action;
        $this->parameters = $parameters;
      }
      
      public function controller(){ return $this->controller; }
      
      public function action(){ return $this->action; }
      
      public function parameters(){ return $this->parameters; }
    }
  }

?>