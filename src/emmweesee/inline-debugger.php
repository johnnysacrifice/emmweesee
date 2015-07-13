<?php

  namespace emmweesee{
    class InlineDebugger implements IDebugger{
      public function show($title, \Exception $e){
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1><?php echo $title; ?></h1>
    <hr>
    <pre>
<?php var_dump($e); ?>
    </pre>
  </body>
</html>
<?php
      }
    }
  }

?>