<?php

  namespace myapp{
    use emmweesee\HttpServer;
    use emmweesee\HttpContext;
    use emmweesee\IControllerFactory;
    use emmweesee\ControllerFactoryContainer;
    use myapp\api\Api;
    use myapp\dashboard\Dashboard;
    use myapp\entry\Entry;
    use myapp\error\Error;
    
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
      
      public static function context(){
        $instance = new HttpContext(new HttpServer());
        return $instance;
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