<?php

  ini_set('display_errors', false);
  ini_set('error_reporting', E_ALL);
  
  define('_', '.');
  require_once _ . '/_.php';
  \_\_::_(sprintf('%s/_.json', _));
  require_once _ . '/app-config.php';
  
  use emmweesee\ErrorHandler;
  use emmweesee\MvcApplication;
  use myapp\AppConfig;
  
  set_error_handler(array(new ErrorHandler, 'handle'));
  
  $cfg = new AppConfig();
  $app = MvcApplication::create($cfg->route(), $cfg->container());
  
  try{ $app->execute(); }catch( Exception $e){ $app->redirect('/error'); }


?>