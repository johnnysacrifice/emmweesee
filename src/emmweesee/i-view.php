<?php

  namespace emmweesee{
    interface IView{
      public function context();
      public function model();
      public function template();
      public function header();
    }
  }

?>