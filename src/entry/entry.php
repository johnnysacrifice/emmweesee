<?php

  namespace entry{
    use emmweesee\Controller;
    use emmweesee\View;
    
    class Entry extends Controller{
      private $entries;
      
      public function __construct(){
        $this->entries = array();
        $this->entries['avatar'] = array('title' => 'Avatar');
        $this->entries['gremlins'] = array('title' => 'Gremlins');
        $this->entries['buffy'] = array('title' => 'Buffy');
        $this->entries['lucy'] = array('title' => 'Lucy');
        $this->entries['untitled'] = array('title' => 'Untitled');
      }
      
      public function show($slug = ''){
        $slug = strtolower($slug);
        if(!array_key_exists($slug, $this->entries)) $this->redirect('/error/not-found');
        return View::create($this->entries[$slug]);
      }
    }
  }

?>