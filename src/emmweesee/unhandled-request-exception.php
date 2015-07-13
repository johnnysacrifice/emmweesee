<?php

  namespace emmweesee{
    class UnhandledRequestException extends \Exception{
      public function __construct($message = '', $code = 0, Exception $innerException = null){
        parent::__construct($message, $code, $innerException);
      }
    }
  }

?>