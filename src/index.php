<?php

  ini_set('display_errors', false);
  ini_set('error_reporting', E_ALL);
  
  define('_', '.');
  define('debug', true);
  require_once _ . '/_.php';
  \_\_::_(sprintf('%s/_.json', _));
  require_once _ . '/app-config.php';
  
  use
    emmweesee\ErrorHandler,
    emmweesee\UnhandledRequestException,
    emmweesee\MvcApplication,
    myapp\AppConfig;
  
  set_error_handler(array(new ErrorHandler, 'handle'));
  
  $cfg = new AppConfig();
  $dbg = $cfg->debugger();
  $app = MvcApplication::create($cfg->route(), $cfg->container());
  
  try{ $app->execute(); }
  catch(UnhandledRequestException $e){ $app->redirect('/error'); }
  catch(Exception $e){ $dbg->show('Exception', $e); }

?>