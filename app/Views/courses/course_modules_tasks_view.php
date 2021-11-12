<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>




<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>

      <th> Task Name </th>
  <th> Module Name </th>
      <th>  Task Duration</th>

      <th> Task Assesment </th>


        <th> Task Created </th>
        <th> Task Updated </th>
        <th> Task Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($task as $md){?>
<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($md['tslug'],'url');?>">  <?= $md['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($md['tslug'],'url');?>"> <?= $md['tname']?></a> </td>



  <td> <?= $md['module']?></td>
  <td> <?= $md['tduration']?>  </td>
  <td> <?= $md['tasses']?>  </td>
  <td> <?= $md['created']?>  </td>
  <td> <?= $md['updated']?>  </td>

<?php  if ($md['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_course_module_task/<?=$md['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_inactive.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_course_module_task/<?=$md['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_active.png');?>" ></a>



      </td>
  <?php }?>
</tr>
<?php } ?>
  </tbody>
</table>

<?= $this->endSection() ?>
