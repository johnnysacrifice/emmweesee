<?php

  namespace myapp{
    if(!defined('debug')) define('debug', false);
    
    use
      emmweesee\StandaloneDebugger,
      emmweesee\InlineDebugger,
      emmweesee\Route,
      emmweesee\IControllerFactory,
      emmweesee\ControllerFactoryContainer,
      myapp\api\Api,
      myapp\dashboard\Dashboard,
      myapp\entry\Entry,
      myapp\error\Error;
    
    class ApiFactory implements IControllerFactory{
      public function invoke(){ return new Api(); }
      public function support($name){ return ('api' === $name); }
    }
    
    class DashboardFactory implements IControllerFactory{
      public function invoke(){ return new Dashboard(); }
      public function support($name){ return ('dashboard' === $name); }
    }
    
    class EntryFactory implements IControllerFactory{
      public function invoke(){ return new Entry(); }
      public function support($name){ return ('entry' === $name); }
    }
    
    class ErrorFactory implements IControllerFactory{
      public function invoke(){ return new Error(); }
      public function support($name){ return ('error' === $name); }
    }
  
    class AppConfig{
      public function __construct(){}
      
      public function debugger(){
        if(debug)
          return new InlineDebugger();
        return new StandaloneDebugger();
      }
      
      public function route(){
        return new Route('dashboard', 'index', array());
      }

      public function container(){
        $instance = new ControllerFactoryContainer();
        $instance->register(new ApiFactory());
        $instance->register(new DashboardFactory());
        $instance->register(new EntryFactory());
        $instance->register(new ErrorFactory());
        return $instance;
      }
    }
  }

?>