<?php

  namespace myapp\dashboard{
    use emmweesee\Controller;
    use emmweesee\View;
    
    class Dashboard extends Controller{
      public function index(){
        return View::create(array('title' => 'Dashboard'));
      }
    }
  }

?>