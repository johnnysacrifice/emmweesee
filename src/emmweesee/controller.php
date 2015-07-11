<?php

  namespace emmweesee{
    abstract class Controller{
      public $context;
      
      public function redirect($to){
        $context = $this->context;
        $context->redirect(sprintf('%s%s', $context->baseUrl(), $to));
      }
    }
  }

?>