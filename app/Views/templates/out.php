  <?= $this->include('header') ?>

<?php   $uri = service('uri');  ?>
      <section id="bradcrumb">

      </section>

      <section id="login">


            <div class="container-fluid" >
                <div class="row">
                  <?php if ($uri->getSegment(1)=='register_student'){
                   $this->renderSection('content');}
                   elseif ($uri->getSegment(1)=='verifycertificate'){
                  $this->renderSection('content');
                  }
                  elseif ($uri->getSegment(1)=='course_view'){
                 $this->renderSection('content');
                 }else{ ?>

               <div class="col-md-9">
                 <?= $this->include('templates/content') ?>

               </div>
               <div class="col-md-3">
                 <div class="row">
                   <?= $this->renderSection('content') ?>
                 </div>

                 <div class="row pad">

                         <h5 class="card-title">Apply for Course</h5>
                         <hr/>
                         <p class="card-text">Apply for course first you have to registre then after you can register for course.</p>
                           <a class="nav-link btn-primary" href="/register_student">Aplply for Course</a>

                   </div>


                 <div class="row pad">


                         <h5 class="card-title">Certificate Verification</h5>
                         <hr/>
                         <p class="card-text">to Verify Certificate you can use following links.</p>
                         <a class="nav-link btn-primary" href="/verifycertificate">Certicate Verification</a>

                   </div>



                 </div>

           </div>
            <?php }?>

          </div>
      </section>

  <?= $this->include('footer') ?>
