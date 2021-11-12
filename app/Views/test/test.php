<		<?php if (isset($validation)): ?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
      </div>
    </div>
    <?php endif; ?>

<?= form_open(); ?>
<div class="form-group">
  <label> Address </label>
  <input type="text" name="address" class="form-control" />

</div>
<div class="form-group">
  <label> days </label>
  <input type="text" name="days" class="form-control" />

</div>
<div class="form-group">
  <label> time </label>
  <input type="text" name="time" class="form-control" />

</div>

<div class="form-group">

  <input type="submit" name="email" class="form-control" />

</div>
<?= form_close(); ?>
