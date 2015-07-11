<?php

  namespace emmweesee{
    interface IControllerFactory{
      public function invoke();
      public function support($controller);
    }
  }

?>