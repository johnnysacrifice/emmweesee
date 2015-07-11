<?php $baseUrl = $this->context->baseUrl(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="An mvc framework ...">
    <meta name="author" content="emmweesee">
    <link rel="icon" href="<?php echo $baseUrl ?>/assets/img/favicon.ico">
    <title><?php echo $model->title; ?></title>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/sticky-footer-navbar.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/site.css">
    <!--[if lt IE 9]>
      <script src="<?php echo $baseUrl; ?>/vendor/html5shiv/dist/html5shiv.min.js"></script>
      <script src="<?php echo $baseUrl; ?>/vendor/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="x-app-master">
    <div class="x-app-header">
      <nav class="navbar navbar-default navbar-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand"><?php echo $model->title; ?></a>
          </div>
        </div>
      </nav>
    </div>
    <div class="x-app-view">