<?php

  namespace api{
    use emmweesee\Controller;
    use emmweesee\View;
    
    class Api extends Controller{
      public function index(){
        return $this->get();
      }
      
      public function get(){
        return View::createJSON(
          array(
            'code' => 1,
            'data' => array(
              array('title' => 'Avatar'),
              array('title' => 'Gremlins'),
              array('title' => 'Buffy'),
              array('title' => 'Lucy'),
              array('title' => 'Untitled')
            )
          )
        );
      }
    }
  }

?>