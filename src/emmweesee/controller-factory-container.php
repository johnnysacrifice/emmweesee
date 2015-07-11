<?php

  namespace emmweesee{
    class ControllerFactoryContainer implements IControllerFactoryContainer{
      private $container;
      
      public function __construct(){ $this->container = array(); }
      
      public function register(IControllerFactory $factory){ $this->container[] =$factory; }
      
      public function all(){ return $this->container; }
    }
  }

?>