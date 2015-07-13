<?php

  namespace myapp\error{
    use emmweesee\Controller;
    use emmweesee\View;
    
    class Error extends Controller{
      public function index(){
        return View::create(array('title' => 'Error', 'message' => 'Unexcepted error occured.'));
      }
      
      public function notFound(){
        return View::create(array('title' => 'Error', 'message' => 'Page not found.'));
      }
    }
  }

?>