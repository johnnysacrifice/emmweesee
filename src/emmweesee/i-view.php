<?php

  namespace emmweesee{
    interface IView{
      public function compile();
      public function render();
      public function model();
      public function template();
      public function compiled();
      public function header();
    }
  }

?>