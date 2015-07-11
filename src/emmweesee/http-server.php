<?php

  namespace emmweesee{
    class HttpServer implements IHttpServer{
      public function get($name){
        return $_SERVER[$name];
      }
    }
  }

?>