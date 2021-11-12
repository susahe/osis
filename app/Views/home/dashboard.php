<?= $this->include('templates/header') ?>

<?= $this->include('templates/nav') ?>


<header id="header">
  <div class="container-fluid">
      <div class="row">
            <div class="col-md-6">

<?php // $this->include('templates/brad') ?>
      </div>
      <div class="col-md-6">

      </div>
  </div>
</header>



<section id="main">
  <div class="container-fluid" >
    <div class="row">
      <div class="col-lg-2">

          <?= $this->include('templates/side') ?>

      </div>

          <div class="col-lg-10">
            <div class="row">
              <div class="col-sm-12">

                <?php if (session()->get('sucess')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('sucess')?>
                  </div>
                <?php endif; ?>

                

                <?= $this->renderSection('content') ?>



              </div>
          </div>
        </div>
</div>

</div>
</section>
<?= $this->include('templates/footer') ?>
