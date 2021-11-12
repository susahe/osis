<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>



<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
        <th> Module Name </th>
      <th> Course Name </th>

      <th>  Theory Hours</th>

      <th> Practical Hrs </th>
      <th> Project Hrs </th>

        <th> Module Created </th>
        <th> Module Updated </th>
        <th> Module Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($module as $md){?>
<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($md['csslug'],'url');?>">  <?= $md['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($md['csslug'],'url');?>"> <?= $md['mdname']?></a> </td>





    <td> <?= $md['course']?>  </td>
  <td> <?= $md['cstheryhrs']?>  </td>
  <td> <?= $md['cspracthrs']?>  </td>
  <td> <?= $md['csprojecthrs']?> </td>
  <td> <?= $md['created']?>  </td>
  <td> <?= $md['updated']?>  </td>

<?php  if ($md['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_course_module/<?=$md['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_inactive.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_course_module/<?=$md['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_active.png');?>" ></a>



      </td>
  <?php }?>
</tr>
<?php } ?>
  </tbody>
</table>

<?= $this->endSection() ?>
