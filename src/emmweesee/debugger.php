<?php

  namespace emmweesee{
    class Debugger implements IDebugger{
      public function show(\Exception $e){
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Exception</title>
  </head>
  <body>
    <h1>Exception</h1>
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