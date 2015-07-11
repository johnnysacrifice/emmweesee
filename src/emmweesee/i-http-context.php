<?php

  namespace emmweesee{
    interface IHttpContext{
      public function baseUrl();
      public function requestPath();
      public function redirect($url);
      public function header($name, $value);
    }
  }

?>