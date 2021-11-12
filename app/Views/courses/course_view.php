<?= $this->include('templates/header') ?>
<h1>Course View</h1>
<?php if (session()->get('sucess')): ?>
<div class="alert alert-success" role="alert">
    <?= session()->get('sucess')?>
  </div>
<?php endif; ?>


  <?= $course['id']?>
  <?= $course['csname']?>
 <?= $course['cstheryhrs']?>
 <?= $course['cspracthrs']?>
<?= $course['csprojecthrs']?>
 <?= $course['csfees']?>
 <?= $course['cstype']?>
 <?= $course['csimage']?>
 <?= $course['csduemonths']?>
 <?= $course['csperyear']?>






<?= $this->include('templates/footer') ?>
