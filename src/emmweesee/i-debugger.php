<?php

  namespace emmweesee{
    interface IDebugger{
      public function show(\Exception $e);
    }
  }

?>