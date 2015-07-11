<?php

  namespace emmweesee{
    if(!defined('_')) define('_', '.');
    
    class View implements IView{
      public $context;
      
      private $model;
      private $template;
      private $compiled;
      private $header;
      
      const HEADER_HTML = 'html';
      const HEADER_JSON = 'json';
      
      private function __construct($model){
        $this->model = $model;
        $this->template = '';
        $this->compiled = '';
        $this->content = '';
      }
      
      public static function create($model, $view = ''){
        $instance = new self($model);
        $instance->template = self::resolve($view);
        $instance->header = self::HEADER_HTML;
        return $instance;
      }
      
      public static function createJSON($model){
        $instance = new self($model);
        $instance->header = self::HEADER_JSON;
        return $instance;
      }
      
      private static function resolve($view = ''){
        list($controller, $view, $trace) = array('', $view, debug_backtrace());
        if(is_array($trace) && count($trace) > 2){
          $controller = self::resolveController($trace);
          $view = ($view === '') ? self::resolveView($trace) : $view;
        }
        return sprintf('%s/%s/%s.html.php', _, $controller, $view);
      }
      
      private static function resolveController($trace){
        $parts = explode('\\', $trace[2]['class']);
        if(count($parts) > 1) array_shift($parts);
        if(count($parts) > 1) array_pop($parts);
        return strtolower(implode('/', $parts));
      }
      
      private static function resolveView($trace){
        $view = '';
        $name = $trace[2]['function'];
        $total = strlen($name);
        for($index = 0; $index < $total; ++$index){
          $character = $name[$index];
          $upper = ctype_upper($character);
          if($upper){
            $view .= '-';
            $view .= strtolower($character);
          }else{
            $view .= $character;
          }
        }
        return $view;
      }
      
      public function compile(){
        if($this->template !== '') $this->compileHTML();
        else $this->compileJSON();
      }
      
      private function compileHTML(){
        $model = $this->dynamic();
        ob_start();
        require $this->template;
        $this->compiled = ob_get_clean();
      }
      
      private function section($view){
        $model = $this->dynamic();
        require sprintf('%s/%s.html.php', _, $view);
      }
      
      private function compileJSON(){ $this->compiled = $this->json(); }
      
      private function dynamic(){ return json_decode(json_encode($this->model)); }
      
      private function json(){ return json_encode($this->model); }
      
      public function render(){ echo $this->compiled(); }
      
      public function model() { return $this->model; }
      
      public function template() { return $this->template; }
      
      public function compiled() { return $this->compiled; }
      
      public function header() { return $this->header; }
    }
  }

?>