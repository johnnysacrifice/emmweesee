<?php

  namespace emmweesee{
    class InlineViewRenderer implements IViewRenderer{
      public function render(IView $view){
        if($view->header() === $view::HEADER_JSON) $this->renderJSON($view);
        else $this->renderHTML($view);
      }
      
      private function renderHTML(IView $view){
        list($context, $model, $template) = array($view->context(), $this->dynamic($view->model()), $view->template());
        $section = $this->section($context, $model);
        $scope = static function() use ($context, $model, $template, $section){
          try{
            ob_start();
            require $template;;
            $compiled = ob_get_clean();
            echo $compiled;
          }catch(\Exception $e){
            ob_get_clean();
            throw $e;
          }
        };
        $scope();
      }
      
      private function section($context, $model){
        $section = static function($view) use ($context, $model){
          require sprintf('%s/%s.html.php', _, $view);
        };
        return $section;
      }
      
      private function renderJSON(IView $view){
        $compiled = $this->json($view->model());
        echo $compiled;
      }
      
      private function dynamic($model){ return json_decode(json_encode($model)); }
      
      private function json($model){ return json_encode($model); }

    }
  }

?>