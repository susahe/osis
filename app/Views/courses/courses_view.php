<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>


<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Theory Hours</th>

      <th> Practical Hrs </th>
      <th> Project Hrs </th>
      <th> Course Fees </th>
      <th> Course Type </th>
      <th> Course Image </th>
      <th>Course Due Months </th>
        <th>Course Per Year </th>
        <th> Course Created </th>
        <th> Course Updated </th>
        <th> Course Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($courses as $course){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>










  <td> <?= $course['cstheryhrs']?>  </td>
  <td> <?= $course['cspracthrs']?>  </td>
  <td> <?= $course['csprojecthrs']?> </td>
  <td> <?= $course['csfees']?>  </td>
  <td> <?= $course['cstype']?>  </td>
  <td> <?= $course['csimage']?>  </td>
  <td> <?= $course['csduemonths']?>  </td>
  <td> <?= $course['csperyear']?>  </td>
  <td> <?= $course['created']?>  </td>
  <td> <?= $course['updated']?>  </td>

<?php  if ($course['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_course/<?=$course['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_inactive.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_course/<?=$course['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_active.png');?>" ></a>



      </td>
  <?php }?>
</tr>
<?php } ?>
  </tbody>
</table>

<?= $this->endSection() ?>
