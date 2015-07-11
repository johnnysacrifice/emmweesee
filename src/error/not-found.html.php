<?php $this->section('shared/header'); ?>
<div class="container-fluid">
  <h1><?php echo $model->title; ?></h1>
  <hr>
  <p><?php echo $model->message; ?></p>
</div>
<?php $this->section('shared/footer'); ?>