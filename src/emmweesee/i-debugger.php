<?php

  namespace emmweesee{
    interface IDebugger{
      public function show($message, \Exception $e);
    }
  }

?>