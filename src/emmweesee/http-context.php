<?php

  namespace emmweesee{
    class HttpContext implements IHttpContext{
      private $httpServer;
      
      public function __construct(IHttpServer $httpServer){
        $this->httpServer = $httpServer;  
      }
      
      public function baseUrl(){
        $server = $this->httpServer;
        $baseUrl = '';
        $scriptUri = $server->get('SCRIPT_NAME');
        $parts = explode('/', $scriptUri);
        $total = count($parts);
        if($total > 0) array_pop($parts);
        $baseUrl = sprintf('%s://%s%s', $server->get('REQUEST_SCHEME'), $server->get('SERVER_NAME'), implode('/', $parts));
        return $baseUrl;
      }
      
      public function requestPath(){
        $server = $this->httpServer;
        $requestPath = '';
        $requestUri = $server->get('REQUEST_URI');
        $scriptUri = $server->get('SCRIPT_NAME');
        $parts = explode('/', $scriptUri);
        $total = count($parts);
        if($total > 0) array_pop($parts);
        $base = sprintf('%s/', implode('/', $parts));
        $length = strlen($base);
        if($length > 0 && strpos($requestUri, $base) === 0) $requestPath = substr($requestUri, $length);
        return $requestPath;
      }
      
      public function redirect($url){
        header(sprintf('Location: %s', $url));
        exit();
      }
      
      public function header($name, $value){
        header(sprintf('%s: %s', $name, $value));
      }
    }
  }

?>