<?php

  namespace emmweesee{
    class InlineViewRenderer implements IViewRenderer{
      public function render(IView $view){
        if($view->template() !== '') $this->renderHTML($view);
        else $this->renderJSON($view);
      }
      
      private function renderHTML(IView $view){
        $context = $view->context();
        $model = $this->dynamic($view->model());
        $section = function($view) use ($context, $model) { $this->section($model, $view, $context); };
        ob_start();
        require $view->template();
        $compiled = ob_get_clean();
        echo $compiled;
      }
      
      private function section($model, $view, $context){
        require sprintf('%s/%s.html.php', _, $view);
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