<?php

  namespace emmweesee{
    interface IControllerFactoryContainer{
      public function register(IControllerFactory $factory);
      public function all();
    }
  }

?>