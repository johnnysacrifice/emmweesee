<?php

  namespace emmweesee{
    class ErrorHandler{
      public function handle($code, $message, $file, $line, array $context){
        if(error_reporting() === 0)
          return false;
        throw new \ErrorException($message, 0, $code, $file, $line);
      }
    }
  }

?>