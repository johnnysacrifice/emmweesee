<?php

  ini_set('display_errors', false);
  ini_set('error_reporting', E_ALL);
  
  define('_', '.');
  require_once _ . '/_.php';
  \_\_::_(sprintf('%s/_.json', _));
  require_once _ . '/app-config.php';
  
  use emmweesee\ErrorHandler;
  use emmweesee\HttpServer;
  use emmweesee\HttpContext;
  use emmweesee\InlineViewRenderer;
  use emmweesee\Route;
  use emmweesee\Router;
  use emmweesee\MvcHandler;
  
  set_error_handler(array(new ErrorHandler, 'handle'));

  $configuration = new AppConfig();  
  $context = $configuration->context();
  $renderer = new InlineViewRenderer();
  $route = (new Router($context, new Route('dashboard', 'index', array())))->resolve();
  $handler = new MvcHandler($context, $configuration->container(), $renderer);
  
  try{ $handler->handle($route); }catch( Exception $e){ $context->redirect( sprintf('%s/error', $context->baseUrl())); }


?>