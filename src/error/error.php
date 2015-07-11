<?php

  namespace error{
    use emmweesee\Controller;
    use emmweesee\View;
    
    class Error extends Controller{
      public function index(){
        return View::create(array('title' => 'Error', 'message' => 'Unexcepted error occured.'));
      }
    }
  }

?>